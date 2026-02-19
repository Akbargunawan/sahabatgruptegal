@extends('layouts.admin')

@section('title', 'Daftar Pembayaran Medical')

@section('content')
<div class="max-w-7xl mx-auto p-6 space-y-6">

    {{-- HEADER --}}
    <div class="flex items-center justify-between border-b pb-4">
        <h1 class="text-lg font-semibold text-gray-800">
            Daftar Pembayaran Medical
        </h1>

        {{-- FILTER (dummy dulu) --}}
        <select
            class="border rounded-lg px-3 py-2 text-sm focus:ring-1 focus:ring-gray-400">
            <option>Semua</option>
            <option>Belum Bayar</option>
            <option>Menunggu Verifikasi</option>
            <option>Lunas</option>
        </select>
    </div>

    {{-- TABLE --}}
    <div class="bg-white border rounded-xl overflow-hidden">

        {{-- HEADER TABLE --}}
        <div class="grid grid-cols-8 bg-gray-100 text-sm font-semibold text-gray-700">
            <div class="px-4 py-3">Nama</div>
            <div class="px-4 py-3">Program</div>
            <div class="px-4 py-3">Kelas</div>
            <div class="px-4 py-3">Nominal</div>
            <div class="px-4 py-3 text-center">Bukti</div>
            <div class="px-4 py-3 text-center">Status Bayar</div>
            <div class="px-4 py-3 text-center">Status Medical</div>
            <div class="px-4 py-3 text-center">Aksi</div>
        </div>

        {{-- DATA REAL --}}
        @forelse ($pesertas as $peserta)
        <div class="grid grid-cols-8 border-t text-sm items-center">

            {{-- NAMA --}}
            <div class="px-4 py-3 font-medium">
                {{ $peserta->name }}
            </div>

            {{-- PROGRAM --}}
            <div class="px-4 py-3 capitalize">
                {{ $peserta->kelas->program ?? '-' }}
            </div>

            {{-- KELAS --}}
            <div class="px-4 py-3">
                {{ $peserta->kelas->nama_kelas ?? '-' }}
            </div>

            {{-- NOMINAL --}}
            <div class="px-4 py-3 font-semibold">
                Rp {{ number_format($peserta->nominal_medical ?? 0, 0, ',', '.') }}
            </div>

            {{-- BUKTI --}}
            <div class="px-4 py-3 text-center">
                <span class="text-gray-400 italic text-xs">
                    Belum Upload
                </span>
            </div>

            {{-- STATUS BAYAR --}}
            <div class="px-4 py-3 text-center">
                @if($peserta->payment)
                    @if($peserta->payment->status == 'pending')
                        <span class="px-2 py-1 text-xs rounded bg-yellow-100 text-yellow-700">
                            Menunggu Verifikasi
                        </span>
                    @elseif($peserta->payment->status == 'lunas')
                        <span class="px-2 py-1 text-xs rounded bg-green-100 text-green-700">
                            Lunas
                        </span>
                    @endif
                @else
                    <span class="px-2 py-1 text-xs rounded bg-gray-100 text-gray-600">
                        Belum Bayar
                    </span>
                @endif
            </div>


            {{-- STATUS MEDICAL --}}
            <div class="px-4 py-3 text-center">
                <span class="px-2 py-1 text-xs rounded bg-gray-100 text-gray-600">
                    Belum Dijadwalkan
                </span>
            </div>

            {{-- AKSI --}}
            <div class="px-4 py-3 text-center">
                @if($peserta->payment && $peserta->payment->status == 'pending')
                    <form action="{{ route('admin.medical.daftar-pembayaran.lunaskan', $peserta->payment->id) }}" method="POST">
                        @csrf
                        <button type="submit"
                                class="px-2 py-1 text-xs rounded bg-blue-600 text-white hover:bg-blue-700">
                            Lunaskan
                        </button>
                    </form>
                @else
                    <span class="text-xs text-gray-400 italic">—</span>
                @endif
            </div>



        </div>
        @empty
        <div class="p-6 text-center text-sm text-gray-500">
            Belum ada peserta yang lolos registrasi.
        </div>
        @endforelse

    </div>

    {{-- NOTE --}}
    <div class="bg-yellow-50 border border-yellow-200 rounded p-4 text-sm text-yellow-700">
        ⚠️ Nominal pembayaran diambil dari menu <b>Atur Nominal Medical</b>.
        Hanya peserta dengan status <b>diterima</b> yang muncul di halaman ini.
    </div>

</div>
@endsection

<script>
document.querySelectorAll('.lunaskan-btn').forEach(function(btn) {
    btn.addEventListener('click', function() {
        const paymentId = this.dataset.id;
        if (!confirm('Yakin ingin melunaskan pembayaran ini?')) return;

        fetch(`/admin/medical/daftar-pembayaran/lunaskan/${paymentId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            },
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                alert(data.message);
                location.reload(); // reload supaya status di tabel berubah
            } else {
                alert('Gagal melunaskan pembayaran');
            }
        });
    });
});
</script>

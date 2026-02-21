@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6 space-y-6">

    {{-- ========================= --}}
    {{-- CEK STATUS VERIFIKASI --}}
    {{-- ========================= --}}
    @if(isset($not_verified) && $not_verified)

        <div class="bg-yellow-50 border border-yellow-300 text-yellow-800 rounded-xl p-6 text-center shadow-sm">
            <h2 class="text-lg font-semibold mb-2">
                Akun Anda belum diverifikasi
            </h2>
            <p class="text-sm">
                Silakan tunggu persetujuan admin sebelum melakukan pembayaran medical.
            </p>
        </div>

    @else

        {{-- ========================= --}}
        {{-- HEADER --}}
        {{-- ========================= --}}
        <div class="bg-gradient-to-r from-blue-800 to-blue-600 text-white rounded-xl p-6 shadow">
            <h1 class="text-xl font-semibold">Pembayaran Medical</h1>
            <p class="text-sm text-blue-100 mt-1">
                Selesaikan pembayaran melalui payment gateway
            </p>
        </div>

        {{-- ========================= --}}
        {{-- INFORMASI PEMBAYARAN --}}
        {{-- ========================= --}}
        <div class="bg-white rounded-xl shadow-sm border p-5">
            <h2 class="text-blue-700 font-semibold mb-4">Informasi Pembayaran</h2>

            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm">Total Biaya Medical</p>
                    <p class="text-2xl font-bold text-gray-800">
                        Rp {{ number_format($payment->amount ?? $nominal, 0, ',', '.') }}
                    </p>
                </div>

                <span class="px-3 py-1 text-xs rounded 
                    @if($payment && $payment->status == 'lunas') bg-green-100 text-green-700
                    @elseif($payment && $payment->status == 'pending') bg-yellow-100 text-yellow-700
                    @elseif($payment && $payment->status == 'gagal') bg-red-100 text-red-700
                    @else bg-gray-100 text-gray-500
                    @endif">

                    @if($payment && $payment->status == 'lunas')
                        Lunas
                    @elseif($payment && $payment->status == 'pending')
                        Menunggu Pembayaran
                    @elseif($payment && $payment->status == 'gagal')
                        Gagal
                    @else
                        Belum Ada Pembayaran
                    @endif

                </span>
            </div>

            <p class="text-sm text-gray-500 mt-4">
                Pembayaran dilakukan melalui payment gateway resmi (Sandbox Midtrans).
            </p>
        </div>

        {{-- ========================= --}}
        {{-- JIKA SUDAH LUNAS --}}
        {{-- ========================= --}}
        @if($payment && $payment->status == 'lunas')

            <div class="bg-green-50 border border-green-200 rounded-xl p-5 text-green-700 text-center shadow-sm">
                <h3 class="font-semibold text-lg mb-2">
                    ✅ Pembayaran Berhasil
                </h3>
                <p class="text-sm">
                    Tagihan medical Anda sudah lunas.
                    Silakan tunggu jadwal medical dari admin.
                </p>
            </div>

        @else

            {{-- ========================= --}}
            {{-- ACTION BAYAR --}}
            {{-- ========================= --}}
            <div class="bg-white rounded-xl shadow-sm border p-5">
                <button
                    id="pay-button"
                    class="w-full bg-blue-700 hover:bg-blue-800 text-white py-3 rounded-lg font-semibold transition">
                    Bayar Sekarang
                </button>

                <p class="text-xs text-gray-500 text-center mt-3">
                    Anda akan diarahkan ke halaman pembayaran resmi.
                </p>
            </div>

        @endif

        {{-- ========================= --}}
        {{-- NOTE --}}
        {{-- ========================= --}}
        <div class="bg-blue-50 border border-blue-200 rounded p-4 text-sm text-blue-700">
            ℹ️ Setelah pembayaran berhasil, status akan diperbarui otomatis dan admin
            akan menjadwalkan medical.
        </div>

    @endif

</div>

{{-- ========================= --}}
{{-- MIDTRANS SNAP --}}
{{-- ========================= --}}
@if(!isset($not_verified) || !$not_verified)
<script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('services.midtrans.client_key') }}"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const payButton = document.getElementById('pay-button');

    if (!payButton) return; // tombol tidak ada kalau sudah lunas

    payButton.addEventListener('click', function () {

        fetch("{{ route('user.medical.pembayaran.pay') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({
                payment_id: {{ $payment->id ?? 'null' }}
            })
        })
        .then(response => response.json())
        .then(data => {

            if (data.snap_token) {
                snap.pay(data.snap_token, {
                    onSuccess: function(result){
                        location.reload(); // reload otomatis setelah bayar sukses
                    },
                    onPending: function(result){
                        location.reload();
                    },
                    onError: function(result){
                        alert("Pembayaran gagal.");
                    }
                });
            } else if (data.error) {
                alert(data.error);
            } else {
                alert("Terjadi kesalahan.");
            }

        })
        .catch(err => {
            console.error("Fetch error:", err);
            alert("Terjadi kesalahan koneksi.");
        });

    });

});
</script>
@endif

@endsection

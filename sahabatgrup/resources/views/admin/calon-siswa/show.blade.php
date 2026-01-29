@extends('layouts.admin')

@section('title', 'Detail Calon Siswa')

@section('content')
<div class="px-8 py-6 max-w-5xl">

    {{-- Header --}}
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">
            Detail Calon Siswa
        </h1>
        <div class="mt-2 border-b"></div>
    </div>

    {{-- Data Siswa --}}
<div class="bg-white border rounded-lg p-6 mb-8">
    <div class="grid grid-cols-2 gap-y-4 gap-x-10 text-sm">

        <div>
            <span class="text-gray-500">Nama</span>
            <p class="font-medium text-gray-800">{{ $siswa->name }}</p>
        </div>

        <div>
            <span class="text-gray-500">Email</span>
            <p class="font-medium text-gray-800">{{ $siswa->email }}</p>
        </div>

        <div>
            <span class="text-gray-500">Phone</span>
            <p class="font-medium text-gray-800">{{ $siswa->phone }}</p>
        </div>

        <div>
            <span class="text-gray-500">Kategori Kelas</span>

            @if ($siswa->kategori_kelas)
                <span class="inline-block mt-1 px-3 py-1 text-xs rounded
                            bg-blue-100 text-blue-700 capitalize">
                    {{ $siswa->kategori_kelas }}
                </span>
            @else
                <span class="inline-block mt-1 text-xs text-gray-400">
                    Tidak dipilih
                </span>
            @endif
        </div>


        <div>
            <span class="text-gray-500">Status</span>

            @if ($siswa->status === 'pending')
                <span class="inline-block px-3 py-1 text-xs rounded
                             bg-yellow-100 text-yellow-700">
                    Pending
                </span>
            @elseif ($siswa->status === 'diterima')
                <span class="inline-block px-3 py-1 text-xs rounded
                             bg-green-100 text-green-700">
                    Diterima
                </span>
            @else
                <span class="inline-block px-3 py-1 text-xs rounded
                             bg-red-100 text-red-700">
                    Ditolak
                </span>
            @endif
        </div>

    </div>
</div>


    {{-- Dokumen --}}
    <div class="bg-white border rounded-lg p-6 mb-8">
        <h2 class="text-lg font-semibold mb-4">Dokumen</h2>

        <div class="grid grid-cols-2 gap-4 text-sm">

          @php
    $dokumen = [
        'KTP' => $siswa->ktp,
        'Kartu Keluarga' => $siswa->kartu_keluarga,
        'Akta Lahir' => $siswa->akta_lahir,
        'Ijazah Terakhir' => $siswa->ijazah_terakhir,
        'BST' => $siswa->bst,
        'Buku Pelaut' => $siswa->buku_pelaut,
        'Paspor' => $siswa->paspor,
        'Sertifikat Lainnya' => $siswa->sertifikat_lainnya,
    ];
@endphp

@foreach ($dokumen as $label => $file)
<div class="flex justify-between items-center border rounded px-4 py-2">
    <span>{{ $label }}</span>

    @if ($file)
        <a href="{{ asset('storage/' . $file) }}"
           target="_blank"
           class="flex items-center gap-1 text-blue-600 text-sm hover:underline">
           📄 Lihat Dokumen
        </a>
    @else
        <span class="text-gray-400 text-sm">Tidak ada</span>
    @endif
</div>
@endforeach



        </div>
    </div>

    {{-- Tentukan Kelas --}}
    {{-- Tentukan Kelas --}}
<div class="bg-white border rounded-lg p-6 mb-8">
    <h2 class="text-lg font-semibold mb-4">Tentukan Kelas</h2>

    <form action="{{ route('admin.calon-siswa.terima', $siswa->id) }}" method="POST">
        @csrf

        <select
            name="kelas_id"
            required
            class="w-full border rounded px-4 py-2 mb-4
                   focus:outline-none focus:ring-1 focus:ring-gray-400">

            <option disabled selected>-- Pilih Kelas --</option>

            @foreach ($kelasList as $kelas)
                <option value="{{ $kelas->id }}">
                    {{ $kelas->nama_kelas }} - {{ $kelas->angkatan }}
                </option>
            @endforeach
        </select>

        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.calon-siswa.index') }}"
               class="px-6 py-2 border rounded hover:bg-gray-100">
                Kembali
            </a>

            <button
                formaction="{{ route('admin.calon-siswa.tolak', $siswa->id) }}"
                class="px-6 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                Tolak
            </button>

            <button
                type="submit"
                class="px-6 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                Terima & Assign Kelas
            </button>
        </div>
    </form>
</div>


</div>
@endsection

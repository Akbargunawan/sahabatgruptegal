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
                <span class="px-2 py-1 text-xs rounded bg-yellow-100 text-yellow-700">
                    Belum Bayar
                </span>
            </div>

            {{-- STATUS MEDICAL --}}
            <div class="px-4 py-3 text-center">
                <span class="px-2 py-1 text-xs rounded bg-gray-100 text-gray-600">
                    Belum Dijadwalkan
                </span>
            </div>

            {{-- AKSI --}}
            <div class="px-4 py-3 text-center">
                <span class="text-xs text-gray-400 italic">
                    —
                </span>
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

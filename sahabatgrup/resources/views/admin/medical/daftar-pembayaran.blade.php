@extends('layouts.admin')

@section('title', 'Daftar Pembayaran Medical')

@section('content')
<div class="max-w-7xl mx-auto p-6 space-y-6">

    {{-- HEADER --}}
    <div class="flex items-center justify-between border-b pb-4">
        <h1 class="text-lg font-semibold text-gray-800">
            Daftar Pembayaran Medical
        </h1>

        {{-- FILTER --}}
        <select
            class="border rounded-lg px-3 py-2 text-sm focus:ring-1 focus:ring-gray-400">
            <option>Semua</option>
            <option>Belum Bayar</option>
            <option>Menunggu Verifikasi</option>
            <option>Lunas (Siap Dijadwalkan)</option>
            <option>Sudah Dijadwalkan</option>
            <option>Selesai</option>
        </select>
    </div>

    {{-- TABLE --}}
    <div class="bg-white border rounded-xl overflow-hidden">

        {{-- HEADER TABLE --}}
        <div class="grid grid-cols-9 bg-gray-100 text-sm font-semibold text-gray-700">
            <div class="px-4 py-3">Nama</div>
            <div class="px-4 py-3">Program</div>
            <div class="px-4 py-3">Kelas</div>
            <div class="px-4 py-3">Angkatan</div>
            <div class="px-4 py-3">Nominal</div>
            <div class="px-4 py-3 text-center">Bukti</div>
            <div class="px-4 py-3 text-center">Status Bayar</div>
            <div class="px-4 py-3 text-center">Status Medical</div>
            <div class="px-4 py-3 text-center">Aksi</div>
        </div>

        {{-- DUMMY DATA --}}
        @php
            $data = [
                [
                    'nama' => 'Akbar Gunawan',
                    'program' => 'Jepang',
                    'kelas' => 'Jepang A',
                    'angkatan' => '2026',
                    'nominal' => 'Rp 750.000',
                    'status_bayar' => 'menunggu',
                    'status_medical' => 'belum_jadwal',
                ],
                [
                    'nama' => 'Rizki Maulana',
                    'program' => 'Korea',
                    'kelas' => 'Korea A',
                    'angkatan' => '2026',
                    'nominal' => 'Rp 900.000',
                    'status_bayar' => 'lunas',
                    'status_medical' => 'siap_jadwal',
                ],
            ];
        @endphp

        @foreach ($data as $item)
        <div class="grid grid-cols-9 border-t text-sm items-center">

            <div class="px-4 py-3 font-medium">{{ $item['nama'] }}</div>
            <div class="px-4 py-3">{{ $item['program'] }}</div>
            <div class="px-4 py-3">{{ $item['kelas'] }}</div>
            <div class="px-4 py-3">{{ $item['angkatan'] }}</div>
            <div class="px-4 py-3">{{ $item['nominal'] }}</div>

            {{-- BUKTI --}}
            <div class="px-4 py-3 text-center">
                <a href="#" class="text-blue-600 hover:underline">Lihat</a>
            </div>

            {{-- STATUS BAYAR --}}
            <div class="px-4 py-3 text-center">
                @if ($item['status_bayar'] === 'lunas')
                    <span class="px-2 py-1 text-xs rounded bg-green-100 text-green-700">
                        Lunas
                    </span>
                @else
                    <span class="px-2 py-1 text-xs rounded bg-yellow-100 text-yellow-700">
                        Menunggu
                    </span>
                @endif
            </div>

            {{-- STATUS MEDICAL --}}
            <div class="px-4 py-3 text-center">
                @if ($item['status_medical'] === 'siap_jadwal')
                    <span class="px-2 py-1 text-xs rounded bg-blue-100 text-blue-700">
                        Siap Dijadwalkan
                    </span>
                @else
                    <span class="px-2 py-1 text-xs rounded bg-gray-100 text-gray-600">
                        Belum Dijadwalkan
                    </span>
                @endif
            </div>

            {{-- AKSI --}}
            <div class="px-4 py-3 text-center space-x-2">

                @if ($item['status_bayar'] === 'menunggu')
                    <button class="px-3 py-1 text-xs bg-green-600 text-white rounded">
                        Terima
                    </button>
                    <button class="px-3 py-1 text-xs bg-red-600 text-white rounded">
                        Tolak
                    </button>
                @elseif ($item['status_medical'] === 'siap_jadwal')
                    <a href="#"
                       class="px-3 py-1 text-xs bg-blue-600 text-white rounded">
                        Atur Jadwal
                    </a>
                @else
                    <span class="text-xs text-gray-400 italic">—</span>
                @endif

            </div>

        </div>
        @endforeach

    </div>

    {{-- NOTE --}}
    <div class="bg-yellow-50 border border-yellow-200 rounded p-4 text-sm text-yellow-700">
        ⚠️ Hanya peserta dengan pembayaran <b>lunas</b> yang dapat dijadwalkan medical.
    </div>

</div>
@endsection

@extends('layouts.app')

@section('title', 'Jadwal Kelas')

@section('content')
<div class="max-w-6xl mx-auto p-6 space-y-6">

    <!-- PAGE HEADER -->
    <div class="flex items-center justify-between border-b pb-4">
        <div class="flex items-center gap-3">
            <div class="p-2 bg-blue-100 rounded-lg">
                <img
                    src="{{ asset('images/menu-jadwal-kelas.svg') }}"
                    alt="Jadwal Kelas"
                    class="w-5 h-5"
                />
            </div>
            <h1 class="text-lg font-semibold text-gray-800">
                Jadwal Kelas Pelatihan
            </h1>
        </div>

        <span class="text-sm text-gray-500">
            Senin – Jumat
        </span>
    </div>

    <!-- INFO BAR -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white border rounded-xl p-4 shadow-sm">
            <p class="text-xs text-gray-500 mb-1">Program</p>
            <p class="font-semibold text-gray-800">Bahasa Jepang</p>
        </div>

        <div class="bg-white border rounded-xl p-4 shadow-sm">
            <p class="text-xs text-gray-500 mb-1">Ruangan</p>
            <p class="font-semibold text-gray-800">A1</p>
        </div>

        <div class="bg-white border rounded-xl p-4 shadow-sm">
            <p class="text-xs text-gray-500 mb-1">Jam Belajar</p>
            <p class="font-semibold text-gray-800">08.00 – 17.00 WIB</p>
        </div>
    </div>

    <!-- SCHEDULE TABLE -->
    <div class="bg-white border rounded-xl shadow-sm overflow-hidden">

        <!-- TABLE HEADER -->
        <div class="grid grid-cols-4 bg-blue-50 text-blue-700 text-sm font-semibold">
            <div class="px-4 py-3">Hari</div>
            <div class="px-4 py-3">Jam</div>
            <div class="px-4 py-3">Ruangan</div>
            <div class="px-4 py-3">Materi</div>
        </div>

        <!-- ROW -->
        @php
            $jadwal = [
                ['hari' => 'Senin',  'jam' => '08.00 – 17.00', 'ruang' => 'A1', 'materi' => 'Kelas Bahasa'],
                ['hari' => 'Selasa', 'jam' => '08.00 – 17.00', 'ruang' => 'A1', 'materi' => 'Kelas Bahasa'],
                ['hari' => 'Rabu',   'jam' => '08.00 – 17.00', 'ruang' => 'A1', 'materi' => 'Kelas Bahasa'],
                ['hari' => 'Kamis',  'jam' => '08.00 – 17.00', 'ruang' => 'A1', 'materi' => 'Kelas Bahasa'],
                ['hari' => 'Jumat',  'jam' => '08.00 – 17.00', 'ruang' => 'A1', 'materi' => 'Praktek'],
            ];
        @endphp

        @foreach ($jadwal as $row)
        <div class="grid grid-cols-4 border-t text-sm">
            <div class="px-4 py-4 font-medium text-gray-800">
                {{ $row['hari'] }}
            </div>
            <div class="px-4 py-4 text-gray-700">
                {{ $row['jam'] }}
            </div>
            <div class="px-4 py-4 text-gray-700">
                {{ $row['ruang'] }}
            </div>
            <div class="px-4 py-4 text-gray-700">
                {{ $row['materi'] }}
            </div>
        </div>
        @endforeach

    </div>

    <!-- NOTE -->
    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
        <p class="text-sm text-blue-700">
            📌 Jadwal kelas ditentukan oleh pihak LPK dan dapat berubah sewaktu-waktu.
            Harap mengikuti informasi resmi dari pengajar.
        </p>
    </div>

</div>
@endsection

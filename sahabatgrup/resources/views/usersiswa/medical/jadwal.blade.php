@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto p-6 space-y-6">

    <!-- PAGE HEADER -->
    <div class="flex items-center gap-3">
        <div class="p-2 bg-blue-100 rounded-lg">
            <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
        </div>
        <h1 class="text-lg font-semibold text-gray-800">
            Jadwal Medical Check-Up
        </h1>
    </div>

    <!-- STATUS CARD -->
    <div class="bg-white border rounded-xl shadow-sm p-6 space-y-4">

        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-gray-800">
                Status Medical
            </h2>

            <!-- STATUS BADGE -->
            <span class="px-3 py-1 text-xs font-medium rounded-full
                bg-green-100 text-green-700">
                Dijadwalkan
            </span>
        </div>

        <p class="text-sm text-gray-600 leading-relaxed">
            Silakan unduh jadwal medical check-up Anda untuk mengetahui
            <span class="font-medium text-gray-800">tanggal, waktu, dan lokasi pemeriksaan</span>.
        </p>

        <!-- MEDICAL INFO -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 pt-2">

            <div class="bg-gray-50 border rounded-lg p-4">
                <p class="text-xs text-gray-500 mb-1">Tanggal</p>
                <p class="font-semibold text-gray-800">20 Februari 2026</p>
            </div>

            <div class="bg-gray-50 border rounded-lg p-4">
                <p class="text-xs text-gray-500 mb-1">Waktu</p>
                <p class="font-semibold text-gray-800">08:00 WIB</p>
            </div>

            <div class="bg-gray-50 border rounded-lg p-4">
                <p class="text-xs text-gray-500 mb-1">Lokasi</p>
                <p class="font-semibold text-gray-800">RS Mitra Sehat</p>
            </div>

        </div>

        <!-- DOWNLOAD BUTTON -->
        <div class="pt-4">
            <a href="#"
               class="inline-flex items-center gap-3 bg-blue-800 hover:bg-blue-900
                      text-white px-6 py-3 rounded-xl text-sm font-semibold transition">

                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4"/>
                </svg>

                Unduh Surat Medical (PDF)
            </a>
        </div>

    </div>

    <!-- NOTE -->
    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
        <p class="text-sm text-blue-700">
            ⚠️ Pastikan Anda hadir sesuai jadwal yang ditentukan.
            Keterlambatan dapat mempengaruhi proses keberangkatan.
        </p>
    </div>

</div>
@endsection

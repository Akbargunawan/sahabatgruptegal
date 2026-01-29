@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto p-6 space-y-6">

    <!-- PAGE HEADER -->
    <div class="flex items-center gap-3">
        <div class="p-2 bg-blue-100 rounded-lg">
            <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 12h6m-6 4h6M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z"/>
            </svg>
        </div>
        <h1 class="text-lg font-semibold text-gray-800">
            Dokumen Hasil Medical Check-Up
        </h1>
    </div>

    <!-- RESULT CARD -->
    <div class="bg-white border rounded-xl shadow-sm p-6 space-y-4">

        <!-- HEADER -->
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 flex items-center justify-center bg-red-100 rounded-lg">
                    <span class="text-red-600 font-bold text-sm">PDF</span>
                </div>

                <div>
                    <p class="font-semibold text-gray-800">
                        Hasil_Medical_AkbarGunawan.pdf
                    </p>
                    <p class="text-xs text-gray-500">
                        Dokumen hasil pemeriksaan medical
                    </p>
                </div>
            </div>

            <!-- STATUS -->
            <span class="px-3 py-1 text-xs font-semibold rounded-full
                bg-green-100 text-green-700">
                LOLOS MEDICAL
            </span>
        </div>

        <hr>

        <p class="text-sm text-gray-600">
            Silakan lihat atau unduh hasil medical Anda.
            Hasil ini digunakan sebagai salah satu syarat kelanjutan proses
            <span class="font-medium text-gray-800">keberangkatan</span>.
        </p>

        <!-- ACTION BUTTONS -->
        <div class="flex flex-wrap gap-4 pt-2">

            <!-- VIEW -->
            <a href="#"
               class="inline-flex items-center gap-2 px-5 py-3
                      bg-blue-800 hover:bg-blue-900 text-white
                      rounded-xl text-sm font-semibold transition">

                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M2.458 12C3.732 7.943 7.523 5 12 5
                             c4.478 0 8.268 2.943 9.542 7
                             -1.274 4.057-5.064 7-9.542 7
                             -4.477 0-8.268-2.943-9.542-7z"/>
                </svg>

                Lihat Dokumen
            </a>

            <!-- DOWNLOAD -->
            <a href="#"
               class="inline-flex items-center gap-2 px-5 py-3
                      bg-gray-100 hover:bg-gray-200 text-gray-800
                      rounded-xl text-sm font-semibold transition">

                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4"/>
                </svg>

                Unduh Dokumen (PDF)
            </a>

        </div>
    </div>

    <!-- NOTE -->
   <div class="bg-green-50 border border-green-200 rounded-lg p-4">
        <p class="text-sm text-green-700">
            ✅ Anda dinyatakan <span class="font-semibold">lolos medical</span>.
            Silakan melanjutkan ke menu
            <span class="font-semibold">Jadwal Kelas</span>
            untuk melihat jadwal pembelajaran Anda.
        </p>
    </div>


</div>
@endsection

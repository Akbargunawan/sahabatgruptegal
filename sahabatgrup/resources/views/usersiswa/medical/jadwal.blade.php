@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto p-6 space-y-6">

    <div class="flex items-center gap-3">
        <div class="p-2 bg-blue-100 rounded-lg">
            <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
        </div>
        <h1 class="text-lg font-semibold text-gray-800">
            Jadwal Medical Check-Up
        </h1>
    </div>

    {{-- BELUM BAYAR --}}
    @if(!$payment || $payment->status !== 'lunas')

        <div class="bg-white border rounded-xl shadow-sm p-6 text-center space-y-4">
            <div class="text-red-600 font-semibold">
                Anda belum menyelesaikan pembayaran medical.
            </div>

            <a href="{{ route('siswa.medical.index') }}"
               class="inline-block bg-blue-800 hover:bg-blue-900 text-white px-6 py-3 rounded-xl text-sm font-semibold transition">
                Bayar Sekarang
            </a>
        </div>

    {{-- SUDAH LUNAS --}}
    @else

        <div class="bg-white border rounded-xl shadow-sm p-6 space-y-4">

            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-gray-800">
                    Status Medical
                </h2>

                <span class="px-3 py-1 text-xs font-medium rounded-full
                    bg-green-100 text-green-700">
                    {{ $payment->medical_status ?? 'Menunggu Jadwal' }}
                </span>
            </div>

            @if($payment->medical_status === 'dijadwalkan' && $payment->jadwal_file)

                <p class="text-sm text-gray-600">
                    Jadwal medical Anda sudah tersedia.
                </p>

                <a href="{{ asset('storage/' . $payment->jadwal_file) }}"
                   target="_blank"
                   class="inline-flex items-center gap-3 bg-blue-800 hover:bg-blue-900
                          text-white px-6 py-3 rounded-xl text-sm font-semibold transition">

                    Unduh Surat Medical (PDF)
                </a>

            @else

                <p class="text-yellow-600 text-sm">
                    Jadwal belum diupload oleh admin.
                </p>

            @endif

        </div>

    @endif

</div>
@endsection
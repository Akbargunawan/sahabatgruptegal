@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="ml-20 max-w-6xl">

    {{-- WELCOME CARD --}}
    <div class="bg-white border border-gray-300 rounded-xl p-8 flex items-center justify-between mb-8 shadow-sm">
        <div>
            <h2 class="text-xl text-gray-600 mb-1">Welcome,</h2>
            <h1 class="text-2xl font-bold mb-2">
                {{ $siswa->name ?? 'Siswa' }}
            </h1>
            <p class="text-gray-500">
                Start your journey to a global career with us.
            </p>
        </div>

        <img
            src="{{ asset('images/avatardashboard.svg') }}"
            alt="Illustration"
            class="w-64 hidden md:block"
        >
    </div>

    {{-- INFO CARDS --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        {{-- STATUS REGISTRASI --}}
        <div class="bg-white border border-gray-300 rounded-xl p-6 shadow-sm">
            <p class="text-gray-500 text-sm mb-4">Status Registrasi</p>

            <div class="flex justify-center">
                @switch($siswa->status)
                    @case('pending')
                        <span class="px-6 py-2 rounded-full text-sm font-semibold bg-yellow-100 text-yellow-700">
                            Menunggu Verifikasi
                        </span>
                        @break

                    @case('diterima')
                        <span class="px-6 py-2 rounded-full text-sm font-semibold bg-green-100 text-green-700">
                            Diterima
                        </span>
                        @break

                    @case('ditolak')
                        <span class="px-6 py-2 rounded-full text-sm font-semibold bg-red-100 text-red-700">
                            Ditolak
                        </span>
                        @break

                    @default
                        <span class="px-6 py-2 rounded-full text-sm font-semibold bg-gray-100 text-gray-600">
                            Tidak diketahui
                        </span>
                @endswitch
            </div>
        </div>

        {{-- KELAS --}}
        <div class="bg-white border border-gray-300 rounded-xl p-6 shadow-sm">
            <p class="text-gray-500 text-sm mb-4">Kelas</p>

            @if ($siswa->kelas)
                <p class="text-lg font-semibold text-center text-blue-700">
                    {{ $siswa->kelas->nama_kelas }}
                </p>
                <p class="text-sm text-center text-gray-500">
                    {{ $siswa->kelas->program }} • Angkatan {{ $siswa->kelas->angkatan }}
                </p>
            @else
                <p class="text-center text-gray-400 italic">
                    Belum ditentukan oleh admin
                </p>
            @endif
        </div>

    </div>

</div>
@endsection

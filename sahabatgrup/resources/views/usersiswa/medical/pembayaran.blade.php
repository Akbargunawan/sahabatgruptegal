@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6 space-y-6">

    <!-- Header -->
    <div class="bg-gradient-to-r from-blue-800 to-blue-600 text-white rounded-xl p-6 shadow">
        <h1 class="text-xl font-semibold">Pembayaran Medical</h1>
        <p class="text-sm text-blue-100 mt-1">
            Silakan selesaikan pembayaran untuk melanjutkan proses medical
        </p>
    </div>

    <!-- Informasi Pembayaran -->
    <div class="bg-white rounded-xl shadow-sm border p-5">
        <h2 class="text-blue-700 font-semibold mb-4">Informasi Pembayaran</h2>

        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm">Total Biaya Medical</p>
                <p class="text-2xl font-bold text-gray-800">Rp 750.000</p>
            </div>
            <span class="px-3 py-1 text-xs bg-yellow-100 text-yellow-700 rounded-full">
                Menunggu Pembayaran
            </span>
        </div>

        <p class="text-sm text-gray-500 mt-4">
            Harap melakukan pembayaran sebelum jadwal medical ditentukan.
        </p>
    </div>

    <!-- Rekening Pembayaran -->
    <div class="bg-white rounded-xl shadow-sm border p-5 space-y-4">
        <h2 class="text-blue-700 font-semibold">Rekening Pembayaran</h2>

        <!-- Bank Item -->
        @php
            $banks = [
                ['logo' => 'bank-bca.png', 'name' => 'Bank BCA'],
                ['logo' => 'bank-bri.png', 'name' => 'Bank BRI'],
                ['logo' => 'bank-mandiri.png', 'name' => 'Bank Mandiri'],
            ];
        @endphp

        @foreach ($banks as $bank)
        <div class="flex items-center justify-between p-4 border rounded-lg hover:bg-gray-50 transition">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/' . $bank['logo']) }}" alt="{{ $bank['name'] }}" class="w-10 h-10">
                <div>
                    <p class="font-semibold text-gray-800">{{ $bank['name'] }}</p>
                    <p class="text-sm text-gray-500">a.n LPK Sahabat Grup</p>
                </div>
            </div>
            <div class="text-sm text-gray-700 font-medium">
                123456789
            </div>
        </div>
        @endforeach
    </div>

    <!-- Upload Bukti Pembayaran -->
    <div class="bg-white rounded-xl shadow-sm border p-5">
        <h2 class="text-blue-700 font-semibold mb-4">Upload Bukti Pembayaran</h2>

        <form action="#" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <label class="block">
                <span class="text-sm font-medium text-gray-700 mb-2 block">
                    Bukti Transfer
                </span>

                <div class="flex items-center justify-center w-full">
                    <label
                        class="flex flex-col items-center justify-center w-full h-40 border-2 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition">
                        
                        <svg class="w-8 h-8 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M7 16V4m0 0l4 4m-4-4L3 8m13 4v8m0 0l4-4m-4 4l-4-4"/>
                        </svg>

                        <p class="text-sm text-gray-500">
                            Klik untuk upload atau drag & drop
                        </p>
                        <p class="text-xs text-gray-400 mt-1">
                            JPG, PNG (Max 2MB)
                        </p>

                        <input type="file" name="bukti_pembayaran" class="hidden">
                    </label>
                </div>
            </label>

            <button type="submit"
                class="w-full bg-blue-700 hover:bg-blue-800 text-white py-3 rounded-lg font-semibold transition">
                Kirim Bukti Pembayaran
            </button>
        </form>
    </div>

</div>
@endsection

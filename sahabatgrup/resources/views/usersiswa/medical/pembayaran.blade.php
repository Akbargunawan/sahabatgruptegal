@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6 space-y-6">

    {{-- HEADER --}}
    <div class="bg-gradient-to-r from-blue-800 to-blue-600 text-white rounded-xl p-6 shadow">
        <h1 class="text-xl font-semibold">Pembayaran Medical</h1>
        <p class="text-sm text-blue-100 mt-1">
            Selesaikan pembayaran melalui payment gateway
        </p>
    </div>

    {{-- INFORMASI PEMBAYARAN --}}
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
            Pembayaran dilakukan secara otomatis melalui payment gateway.
        </p>
    </div>

    {{-- METODE PEMBAYARAN --}}
    <div class="bg-white rounded-xl shadow-sm border p-5 space-y-4">
        <h2 class="text-blue-700 font-semibold">Pilih Metode Pembayaran</h2>

        @php
            $methods = [
                ['icon' => '💳', 'name' => 'Virtual Account'],
                ['icon' => '📱', 'name' => 'E-Wallet'],
                ['icon' => '🔳', 'name' => 'QRIS'],
            ];
        @endphp

        @foreach ($methods as $method)
        <label class="flex items-center justify-between p-4 border rounded-lg cursor-pointer hover:bg-gray-50 transition">
            <div class="flex items-center gap-3">
                <span class="text-xl">{{ $method['icon'] }}</span>
                <span class="font-medium text-gray-800">{{ $method['name'] }}</span>
            </div>
            <input type="radio" name="payment_method" class="accent-blue-600">
        </label>
        @endforeach
    </div>

    {{-- ACTION --}}
    <div class="bg-white rounded-xl shadow-sm border p-5">
        <button
            class="w-full bg-blue-700 hover:bg-blue-800 text-white py-3 rounded-lg font-semibold transition">
            Bayar Sekarang
        </button>

        <p class="text-xs text-gray-500 text-center mt-3">
            Anda akan diarahkan ke halaman pembayaran resmi.
        </p>
    </div>

    {{-- NOTE --}}
    <div class="bg-blue-50 border border-blue-200 rounded p-4 text-sm text-blue-700">
        ℹ️ Status pembayaran akan diperbarui otomatis setelah transaksi berhasil.
    </div>

</div>
@endsection

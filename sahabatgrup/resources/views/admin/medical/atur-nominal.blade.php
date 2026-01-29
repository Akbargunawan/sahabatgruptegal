@extends('layouts.admin')

@section('title', 'Atur Nominal Medical')

@section('content')
<div class="max-w-4xl mx-auto p-6 space-y-6">

    {{-- HEADER --}}
    <div class="border-b pb-4">
        <h1 class="text-xl font-semibold text-gray-800">
            Atur Nominal Medical
        </h1>
        <p class="text-sm text-gray-500 mt-1">
            Nominal ini akan muncul di menu <b>Medical → Pembayaran</b> peserta.
        </p>
    </div>

    {{-- FORM --}}
    <div class="bg-white border rounded-xl p-6 space-y-6">

        {{-- PROGRAM JEPANG --}}
        <div>
            <h2 class="font-semibold text-gray-700 mb-3">
                Program Jepang
            </h2>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="text-sm text-gray-600">
                        Nominal Medical
                    </label>
                    <input
                        type="text"
                        value="750000"
                        placeholder="Contoh: 750000"
                        class="w-full border rounded px-4 py-2 mt-1 focus:ring-1 focus:ring-blue-500 focus:outline-none">
                </div>

                <div>
                    <label class="text-sm text-gray-600">
                        Keterangan (Opsional)
                    </label>
                    <input
                        type="text"
                        placeholder="Contoh: Medical Awal"
                        class="w-full border rounded px-4 py-2 mt-1 focus:ring-1 focus:ring-blue-500 focus:outline-none">
                </div>
            </div>
        </div>

        <hr>

        {{-- PROGRAM KOREA --}}
        <div>
            <h2 class="font-semibold text-gray-700 mb-3">
                Program Korea
            </h2>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="text-sm text-gray-600">
                        Nominal Medical
                    </label>
                    <input
                        type="text"
                        value="900000"
                        placeholder="Contoh: 900000"
                        class="w-full border rounded px-4 py-2 mt-1 focus:ring-1 focus:ring-blue-500 focus:outline-none">
                </div>

                <div>
                    <label class="text-sm text-gray-600">
                        Keterangan (Opsional)
                    </label>
                    <input
                        type="text"
                        placeholder="Contoh: Medical Lengkap"
                        class="w-full border rounded px-4 py-2 mt-1 focus:ring-1 focus:ring-blue-500 focus:outline-none">
                </div>
            </div>
        </div>

    </div>

    {{-- BUTTON --}}
    <div class="flex justify-end gap-3">
        <a href="/admin/medical/daftar-pembayaran"
           class="px-6 py-2 border rounded hover:bg-gray-100">
            Kembali
        </a>

        <button
            class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Simpan Nominal
        </button>
    </div>

    {{-- NOTE --}}
    <div class="bg-yellow-50 border border-yellow-200 rounded p-4 text-sm text-yellow-700">
        ⚠️ Perubahan nominal akan mempengaruhi peserta yang <b>belum melakukan pembayaran medical</b>.
    </div>

</div>
@endsection

@extends('layouts.admin')

@section('content')
<div class="px-8 py-6">

    {{-- Header --}}
    <div class="mb-6">
        <h1 class="text-xl font-semibold text-gray-800">
            Tambah Kelas Pelatihan
        </h1>
        <div class="mt-2 border-b border-gray-300"></div>
    </div>

    {{-- Form --}}
    <form action="{{ route('admin.kelas.store') }}"
          method="POST"
          class="space-y-6">
        @csrf

        {{-- Row 1 --}}
        <div class="grid grid-cols-2 gap-6">

            {{-- Nama Kelas --}}
            <div>
                <label class="block text-sm font-medium mb-1">
                    Nama Kelas
                </label>
                <input type="text"
                       name="nama_kelas"
                       placeholder="Nama Kelas"
                       required
                       class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-1 focus:ring-gray-400">
            </div>

            {{-- Kuota --}}
            <div>
                <label class="block text-sm font-medium mb-1">
                    Kuota Siswa
                </label>
                <input type="number"
                       name="kuota"
                       value="20"
                       required
                       class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-1 focus:ring-gray-400">
            </div>

        </div>

        {{-- Row 2 --}}
        <div class="grid grid-cols-2 gap-6">

            {{-- Program --}}
            <div>
                <label class="block text-sm font-medium mb-1">
                    Program Kelas
                </label>
                <select name="program"
                        required
                        class="w-full border rounded px-3 py-2">
                    <option value="Korea">Korea</option>
                    <option value="Jepang">Jepang</option>
                </select>
            </div>

            {{-- Status --}}
            <div>
                <label class="block text-sm font-medium mb-2">
                    Status Kelas
                </label>
                <div class="flex gap-6 mt-2">
                    <label class="flex items-center gap-2">
                        <input type="radio"
                               name="status"
                               value="aktif"
                               checked>
                        Aktif
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="radio"
                               name="status"
                               value="nonaktif">
                        Nonaktif
                    </label>
                </div>
            </div>

        </div>

        {{-- Angkatan --}}
        <div class="w-1/2">
            <label class="block text-sm font-medium mb-1">
                Angkatan
            </label>
            <select name="angkatan"
                    required
                    class="w-full border rounded px-3 py-2">
                <option value="2026">2026</option>
                <option value="2025">2025</option>
            </select>
        </div>

        {{-- Divider --}}
        <div class="pt-10 border-t"></div>

        {{-- Action --}}
        <div class="flex justify-end gap-4">
            <a href="{{ route('admin.kelas.index') }}"
               class="px-6 py-2 border rounded hover:bg-gray-100">
                Batal
            </a>

            <button type="submit"
                    class="px-6 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                Simpan
            </button>
        </div>

    </form>

</div>
@endsection

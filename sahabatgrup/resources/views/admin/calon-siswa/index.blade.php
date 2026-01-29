@extends('layouts.admin')

@section('title', 'Calon Siswa')

@section('content')
<div class="px-8 py-6">

    {{-- HEADER --}}
    <div class="mb-6">
        <h1 class="text-xl font-semibold text-gray-800">
            Calon Siswa
        </h1>
        <div class="mt-2 border-b border-gray-300"></div>
    </div>

    {{-- SEARCH & FILTER --}}
    <form method="GET" class="flex items-center gap-3 mb-4">

        {{-- Search --}}
        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari nama / email..."
            class="h-9 w-56 border rounded px-3 text-sm
                   focus:outline-none focus:ring-1 focus:ring-gray-400"
        >

        {{-- Filter Status --}}
        <select
            name="status"
            class="h-9 border rounded px-3 text-sm
                   focus:outline-none focus:ring-1 focus:ring-gray-400">
            <option value="">Semua Status</option>
            <option value="pending" {{ request('status')=='pending' ? 'selected' : '' }}>
                Pending
            </option>
            <option value="diterima" {{ request('status')=='diterima' ? 'selected' : '' }}>
                Diterima
            </option>
            <option value="ditolak" {{ request('status')=='ditolak' ? 'selected' : '' }}>
                Ditolak
            </option>
        </select>

        {{-- Button Cari --}}
        <button
            type="submit"
            class="h-9 px-4 bg-gray-700 text-white rounded text-sm
                   hover:bg-gray-800 transition">
            Cari
        </button>

        {{-- Reset --}}
        <a href="{{ route('admin.calon-siswa.index') }}"
           class="h-9 px-4 bg-gray-200 rounded text-sm flex items-center
                  hover:bg-gray-300 transition">
            Reset
        </a>

    </form>

    {{-- TABLE --}}
    <div class="overflow-x-auto bg-white border rounded">
        <table class="w-full text-sm">
            <thead class="bg-gray-600 text-white">
                <tr>
                    <th class="p-3 w-12 text-center">No</th>
                    <th class="text-left p-3">Nama</th>
                    <th class="text-left p-3">Email</th>
                    <th class="p-3 text-center">Status</th>
                    <th class="p-3 w-32 text-center">Aksi</th>
                </tr>
            </thead>

           <tbody>
                @forelse ($calonSiswa as $index => $siswa)
                <tr class="border-t hover:bg-gray-50 transition">
                    <td class="p-3 text-center">{{ $index + 1 }}</td>
                    <td>{{ $siswa->name }}</td>
                    <td>{{ $siswa->email }}</td>
                    <td class="text-center">
                        @if ($siswa->status === 'pending')
                            <span class="px-3 py-1 rounded-full text-xs bg-yellow-100 text-yellow-700">
                                Pending
                            </span>
                        @elseif ($siswa->status === 'diterima')
                            <span class="px-3 py-1 rounded-full text-xs bg-green-100 text-green-700">
                                Diterima
                            </span>
                        @else
                            <span class="px-3 py-1 rounded-full text-xs bg-red-100 text-red-700">
                                Ditolak
                            </span>
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="{{ route('admin.calon-siswa.show', $siswa->id) }}"
                        class="px-3 py-1 border rounded text-xs hover:bg-gray-100">
                            Detail
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center p-6 text-gray-500">
                        Data calon siswa kosong
                    </td>
                </tr>
                @endforelse
                </tbody>

        </table>
    </div>

</div>
@endsection

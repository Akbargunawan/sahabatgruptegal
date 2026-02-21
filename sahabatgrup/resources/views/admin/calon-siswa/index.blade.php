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

    {{-- NOTIFIKASI --}}
    @if(session('success'))
        <div class="mb-4 p-3 rounded bg-green-100 text-green-700 text-sm">
            {{ session('success') }}
        </div>
    @endif

    {{-- SEARCH & FILTER --}}
    <form method="GET" class="flex items-center gap-3 mb-4">

        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari nama / email..."
            class="h-9 w-56 border rounded px-3 text-sm
                   focus:outline-none focus:ring-1 focus:ring-gray-400"
        >

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

        <button
            type="submit"
            class="h-9 px-4 bg-gray-700 text-white rounded text-sm
                   hover:bg-gray-800 transition">
            Cari
        </button>

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
                    <th class="text-left p-3">Kategori Kelas</th> {{-- TAMBAHAN --}}
                    <th class="p-3 text-center">Status</th>
                    <th class="p-3 w-40 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($calonSiswa as $index => $siswa)
                <tr class="border-t hover:bg-gray-50 transition">
                    <td class="p-3 text-center">{{ $index + 1 }}</td>
                    <td class="p-3">{{ $siswa->name }}</td>
                    <td class="p-3">{{ $siswa->email }}</td>

                    {{-- KATEGORI KELAS --}}
                    <td class="p-3">
                        @php
                            $kelasColors = [
                                'reguler' => 'bg-blue-100 text-blue-700',
                                'intensif' => 'bg-purple-100 text-purple-700',
                                'private' => 'bg-indigo-100 text-indigo-700',
                            ];
                        @endphp

                        <span class="px-3 py-1 rounded-full text-xs 
                            {{ $kelasColors[$siswa->kategori_kelas] ?? 'bg-gray-100 text-gray-600' }}">
                            {{ ucfirst($siswa->kategori_kelas ?? '-') }}
                        </span>
                    </td>

                    {{-- STATUS --}}
                    <td class="p-3 text-center">
                        @if ($siswa->status === 'pending')
                            <span class="px-3 py-1 rounded-full text-xs bg-yellow-100 text-yellow-700">
                                Pending
                            </span>
                        @elseif ($siswa->status === 'diterima')
                            <span class="px-3 py-1 rounded-full text-xs bg-green-100 text-green-700">
                                Diterima
                            </span>
                        @elseif ($siswa->status === 'ditolak')
                            <span class="px-3 py-1 rounded-full text-xs bg-red-100 text-red-700">
                                Ditolak
                            </span>
                        @else
                            <span class="px-3 py-1 rounded-full text-xs bg-gray-100 text-gray-600">
                                -
                            </span>
                        @endif
                    </td>

                    {{-- AKSI --}}
                    <td class="p-3 text-center">
                        <div class="flex justify-center gap-2">

                            <a href="{{ route('admin.calon-siswa.show', $siswa->id) }}"
                               class="px-3 py-1 border rounded text-xs hover:bg-gray-100">
                                Detail
                            </a>

                            <form action="{{ route('admin.calon-siswa.destroy', $siswa->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="px-3 py-1 bg-red-600 text-white rounded text-xs hover:bg-red-700 transition">
                                    Hapus
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center p-6 text-gray-500">
                        Data calon siswa kosong
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection

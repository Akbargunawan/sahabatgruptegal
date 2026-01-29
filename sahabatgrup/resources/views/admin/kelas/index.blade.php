@extends('layouts.admin')

@section('title', 'Kelas Pelatihan')

@section('content')
<h1 class="text-xl font-semibold mb-4">Kelas Pelatihan</h1>

<a href="{{ route('admin.kelas.create') }}"
   class="inline-block mb-4 px-4 py-2 border rounded hover:bg-gray-100 transition">
    + Tambah Kelas
</a>

<div class="overflow-x-auto bg-white border rounded">
    <table class="w-full text-sm">
        <thead class="bg-gray-600 text-white">
            <tr>
                <th class="p-3">No</th>
                <th>Nama Kelas</th>
                <th>Program</th>
                <th>Angkatan</th>
                <th>Kuota</th>
                <th>Terisi</th>
                <th>Status</th>
                <th>Jadwal</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
        @forelse($kelas as $item)
        <tr class="border-t text-center">
            <td class="p-3">{{ $loop->iteration }}</td>
            <td class="font-medium">{{ $item->nama_kelas }}</td>
            <td>{{ $item->program }}</td>
            <td>{{ $item->angkatan }}</td>
            <td>{{ $item->kuota }}</td>
            <td>{{ $item->terisi }}</td>

            <!-- STATUS KELAS -->
            <td>
                <span class="px-2 py-1 text-xs rounded
                {{ $item->status === 'aktif' ? 'bg-green-100 text-green-700' : 'bg-gray-200 text-gray-600' }}">
                    {{ ucfirst($item->status) }}
                </span>
            </td>

            <!-- STATUS JADWAL -->
            <td>
                @if($item->jadwal_ada ?? false)
                    <span class="text-green-600 font-semibold text-sm">
                        ✔ Sudah diatur
                    </span>
                @else
                    <span class="text-red-600 text-sm">
                        ✖ Belum
                    </span>
                @endif
            </td>

            <!-- AKSI -->
            <td class="space-x-2">
                <a href="#"
                   class="text-blue-600 hover:underline text-sm">
                    Edit
                </a>

                <a href="#"
                   class="text-indigo-600 hover:underline text-sm">
                    Atur Jadwal
                </a>

                @if($item->jadwal_ada ?? false)
                <a href="#"
                   class="text-green-600 hover:underline text-sm">
                    Lihat
                </a>
                @endif
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="9" class="p-4 text-center text-gray-500">
                Belum ada kelas
            </td>
        </tr>
        @endforelse
        </tbody>

    </table>
</div>
@endsection

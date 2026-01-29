@extends('layouts.admin')

@section('title', 'Atur Jadwal Kelas')

@section('content')
<div class="max-w-7xl mx-auto p-6 space-y-6">

    <!-- HEADER -->
    <div class="flex items-center justify-between border-b pb-4">
        <h1 class="text-lg font-semibold text-gray-800">
            Atur Jadwal Kelas
        </h1>
        <span class="text-sm text-gray-500">
            Jadwal Senin – Jumat
        </span>
    </div>

    <!-- INFO -->
    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
        <p class="text-sm text-blue-700">
            Pilih kelas yang sudah aktif, lalu tentukan jadwal mingguan.
            Program dan angkatan akan menyesuaikan otomatis.
        </p>
    </div>

    <!-- FORM -->
    <form class="bg-white border rounded-xl shadow-sm p-6 space-y-6">

        <!-- PILIH KELAS -->
        <div>
            <label class="text-sm font-medium">Nama Kelas</label>
            <select class="w-full mt-1 border rounded-lg px-3 py-2">
                <option>Jepang A</option>
                <option>Korea A</option>
            </select>
        </div>

        <!-- INFO OTOMATIS -->
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="text-sm font-medium">Program</label>
                <input type="text"
                       class="w-full mt-1 border rounded-lg px-3 py-2 bg-gray-100"
                       value="Bahasa Jepang"
                       readonly>
            </div>

            <div>
                <label class="text-sm font-medium">Angkatan</label>
                <input type="text"
                       class="w-full mt-1 border rounded-lg px-3 py-2 bg-gray-100"
                       value="2026"
                       readonly>
            </div>
        </div>

        <!-- TABLE JADWAL -->
        <div class="overflow-x-auto">
            <table class="w-full border text-sm">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="border px-4 py-2 text-left">Hari</th>
                        <th class="border px-4 py-2">Jam</th>
                        <th class="border px-4 py-2">Materi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach (['Senin','Selasa','Rabu','Kamis','Jumat'] as $hari)
                    <tr>
                        <td class="border px-4 py-3 font-medium">
                            {{ $hari }}
                        </td>
                        <td class="border px-4 py-2">
                            <input type="text"
                                   class="w-full border rounded px-2 py-1"
                                   placeholder="08.00 - 17.00">
                        </td>
                        <td class="border px-4 py-2">
                            <input type="text"
                                   class="w-full border rounded px-2 py-1"
                                   placeholder="Bahasa / Praktek">
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        <!-- SUBMIT -->
        <div class="flex justify-end">
            <button
                class="px-6 py-2 bg-blue-700 text-white rounded-lg hover:bg-blue-800">
                Simpan Jadwal Kelas
            </button>
        </div>

    </form>

</div>
@endsection

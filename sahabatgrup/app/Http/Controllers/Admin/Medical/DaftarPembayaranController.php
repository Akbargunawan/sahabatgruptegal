<?php

namespace App\Http\Controllers\Admin\Medical;

use App\Http\Controllers\Controller;
use App\Models\CalonSiswa;
use App\Models\MedicalNominal;

class DaftarPembayaranController extends Controller
{
    public function index()
    {
        // Ambil siswa yang SUDAH DITERIMA
        $pesertas = CalonSiswa::where('status', 'diterima')->get();

        // Ambil semua nominal medical (1 query)
        $nominals = MedicalNominal::pluck('nominal', 'program');

        // Sisipkan nominal ke setiap peserta
        $pesertas->map(function ($siswa) use ($nominals) {
            $siswa->nominal_medical = $nominals[$siswa->kategori_kelas] ?? 0;
            return $siswa;
        });

        return view('admin.medical.daftar-pembayaran', compact('pesertas'));
    }
}

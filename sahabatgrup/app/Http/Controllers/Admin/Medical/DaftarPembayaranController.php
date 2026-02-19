<?php

namespace App\Http\Controllers\Admin\Medical;

use App\Http\Controllers\Controller;
use App\Models\CalonSiswa;
use App\Models\MedicalNominal;
use App\Models\MedicalPayment;

class DaftarPembayaranController extends Controller
{
    // Tampilkan daftar pembayaran
    public function index()
    {
        // Ambil siswa yang SUDAH DITERIMA
        $pesertas = CalonSiswa::where('status', 'diterima')->get();

        // Ambil semua nominal medical (1 query)
        $nominals = MedicalNominal::pluck('nominal', 'program');

        // Sisipkan nominal dan cek payment
        $pesertas->map(function ($siswa) use ($nominals) {
            $siswa->nominal_medical = $nominals[$siswa->kategori_kelas] ?? 0;

            // Ambil payment record jika ada (user sudah klik Bayar Sekarang)
            $siswa->payment = $siswa->medicalPayment ?? null;

            return $siswa;
        });

        return view('admin.medical.daftar-pembayaran', compact('pesertas'));
    }

    // Admin lunaskan pembayaran
    public function lunaskanPayment($id)
    {
        $payment = MedicalPayment::findOrFail($id);

        // Hanya bisa lunaskan jika status pending
        if (!$payment || $payment->status != 'pending') {
            return redirect()->back()->with('error', 'Pembayaran sudah dilunaskan atau tidak valid.');
        }

        $payment->update([
            'status' => 'lunas',
            'payment_type' => 'manual_admin', // tandai bahwa admin yang lunaskan
        ]);

        return redirect()->back()->with('success', 'Pembayaran berhasil dilunaskan.');
    }
}

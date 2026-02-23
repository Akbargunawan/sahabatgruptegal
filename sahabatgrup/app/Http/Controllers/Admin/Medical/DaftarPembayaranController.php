<?php

namespace App\Http\Controllers\Admin\Medical;

use App\Http\Controllers\Controller;
use App\Models\CalonSiswa;
use Illuminate\Http\Request;
use App\Models\MedicalNominal;
use App\Models\MedicalPayment;

class DaftarPembayaranController extends Controller
{
    // Tampilkan daftar pembayaran
   public function index()
    {
        // Ambil siswa yang SUDAH DITERIMA + relasi payment
        $pesertas = CalonSiswa::with('medicalPayment')
            ->where('status', 'diterima')
            ->get();

        // Ambil semua nominal medical
        $nominals = MedicalNominal::pluck('nominal', 'program');

        $pesertas->map(function ($siswa) use ($nominals) {

            $siswa->nominal_medical = $nominals[$siswa->kategori_kelas] ?? 0;

            // langsung ambil dari relasi
            $siswa->payment = $siswa->medicalPayment;

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

    public function uploadJadwal(Request $request, $id)
    {
        $request->validate([
            'jadwal_file' => 'required|mimes:pdf|max:2048'
        ]);

        $payment = MedicalPayment::findOrFail($id);

        $filePath = $request->file('jadwal_file')
            ->store('jadwal-medical', 'public');

        $payment->update([
            'jadwal_file' => $filePath,
            'medical_status' => 'dijadwalkan'
        ]);

        return back()->with('success', 'Jadwal medical berhasil diupload');
    }
}

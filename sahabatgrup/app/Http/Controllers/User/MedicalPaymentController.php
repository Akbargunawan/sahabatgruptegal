<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MedicalPayment;
use App\Models\MedicalNominal;
use Midtrans\Snap;
use Midtrans\Config;

class MedicalPaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('siswa.auth'); // middleware custom
    }

    // Tampilkan halaman pembayaran
    public function index()
    {
        $user = session('siswa');
        if (!$user) {
            return redirect()->route('login.siswa');
        }

        // ❗ CEK STATUS VERIFIKASI
        if ($user->status !== 'diterima') {
            return view('usersiswa.medical.pembayaran', [
                'payment' => null,
                'nominal' => 0,
                'not_verified' => true
            ]);
        }

        // Ambil nominal berdasarkan program siswa
        $nominalData = MedicalNominal::where('program', $user->kategori_kelas)->first();
        $nominal = $nominalData ? $nominalData->nominal : 500000;

         $payment = MedicalPayment::where('calon_siswa_id', $user->id)
            ->latest()
            ->first();


        return view('usersiswa.medical.pembayaran', [
            'payment' => $payment,
            'nominal' => $nominal,
            'not_verified' => false
        ]);
    }


  // Buat pembayaran dan generate Snap token saat user klik "Bayar Sekarang"
    public function pay(Request $request)
    {
        $user = session('siswa');

        // Cek login
        if (!$user) {
            return response()->json([
                'error' => 'User tidak login'
            ], 401);
        }

        // ✅ Cek status verifikasi admin
        if ($user->status !== 'diterima') {
            return response()->json([
                'error' => 'Akun belum diverifikasi oleh admin'
            ], 403);
        }

        // Ambil nominal berdasarkan program siswa
        $nominal = MedicalNominal::where('program', $user->kategori_kelas)
                    ->value('nominal') ?? 500000;

        // Ambil payment lama atau buat baru
        $payment = MedicalPayment::firstOrCreate(
            ['calon_siswa_id' => $user->id],
            [
                'order_id' => 'MED-' . time(),
                'amount'   => $nominal,
                'status'   => 'pending',
            ]
        );

        // ✅ Generate order_id baru setiap klik bayar supaya tidak duplicate di Midtrans
        $payment->order_id = 'MED-' . time();
        $payment->amount   = $nominal;
        $payment->status   = 'pending';
        $payment->save();

        // Midtrans config
        \Midtrans\Config::$serverKey = config('services.midtrans.server_key');
        \Midtrans\Config::$isProduction = filter_var(config('services.midtrans.is_production'), FILTER_VALIDATE_BOOLEAN);
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => $payment->order_id,
                'gross_amount' => $payment->amount,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
            ],
            'enabled_payments' => [
                'bank_transfer',
                'gopay',
                'shopeepay',
                'ovo',
            ],
        ];

        try {
            $snapToken = \Midtrans\Snap::getSnapToken($params);

            return response()->json([
                'snap_token' => $snapToken
            ]);

        } catch (\Exception $e) {

            \Log::error('Midtrans Error: ' . $e->getMessage());

            return response()->json([
                'error'   => 'Gagal membuat Snap Token',
                'message' => $e->getMessage()
            ], 500);
        }
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\CalonSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserSiswaAuthController extends Controller
{
  public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|unique:calon_siswa,email',
        'phone' => 'required',
        'password' => 'required|min:6',
        'kategori_kelas' => 'required',

         // 🔐 VALIDASI FILE (INI YANG KURANG)
        'ktp' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        'kartu_keluarga' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        'akta_lahir' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        'ijazah_terakhir' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        'bst' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        'buku_pelaut' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        'paspor' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        'sertifikat_lainnya' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
    ]);

    // ❌ JANGAN request->all()
    $data = $request->except([
        'password',
        'ktp',
        'kartu_keluarga',
        'akta_lahir',
        'ijazah_terakhir',
        'bst',
        'buku_pelaut',
        'paspor',
        'sertifikat_lainnya',
    ]);

    $data['password'] = Hash::make($request->password);
    $data['status'] = 'pending';

    // ✅ SIMPAN PATH FILE SAJA
    $data['ktp'] = $request->file('ktp')->store('dokumen', 'public');
    $data['kartu_keluarga'] = $request->file('kartu_keluarga')->store('dokumen', 'public');
    $data['akta_lahir'] = $request->file('akta_lahir')->store('dokumen', 'public');
    $data['ijazah_terakhir'] = $request->file('ijazah_terakhir')->store('dokumen', 'public');
    $data['bst'] = $request->file('bst')->store('dokumen', 'public');
    $data['buku_pelaut'] = $request->file('buku_pelaut')->store('dokumen', 'public');
    $data['paspor'] = $request->file('paspor')->store('dokumen', 'public');

    if ($request->hasFile('sertifikat_lainnya')) {
        $data['sertifikat_lainnya'] =
            $request->file('sertifikat_lainnya')->store('dokumen', 'public');
    }

    CalonSiswa::create($data);

    return redirect()->route('login.siswa')
        ->with('success', 'Registrasi berhasil');
}

public function loginForm()
{
    return view('usersiswa.login');
}

  

   public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Ambil siswa berdasarkan email
    $siswa = CalonSiswa::where('email', $request->email)->first();

    if (!$siswa) {
        return back()->withErrors([
            'email' => 'Email tidak terdaftar',
        ])->withInput();
    }

    if (!Hash::check($request->password, $siswa->password)) {
        return back()->withErrors([
            'password' => 'Password salah',
        ])->withInput();
    }

    // SIMPAN DATA SISWA KE SESSION (LENGKAP)
    session([
        'siswa_login' => true,
        'siswa' => $siswa, // 👈 PENTING
    ]);

    return redirect()->route('user.dashboard');
}
     // ================= LOGOUT =================
    public function logout()
    {
        session()->forget([
            'siswa_login',
            'siswa_id',
            'siswa_name',
            'siswa_status',
        ]);

        return redirect()->route('login.siswa');
    }

}

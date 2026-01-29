<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CalonSiswa;

class DashboardController extends Controller
{
    public function index()
    {
        $siswa = session('siswa');

        if (!$siswa) {
            return redirect()->route('login.siswa');
        }

        // refresh data dari DB (biar status & kelas update)
        $siswa = CalonSiswa::with('kelas')->find($siswa->id);

        return view('usersiswa.dashboard', compact('siswa'));
    }
}

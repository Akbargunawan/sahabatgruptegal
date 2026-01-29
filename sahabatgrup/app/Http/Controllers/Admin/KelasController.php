<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; // ← INI WAJIB
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
    $kelas = Kelas::all(); // ← AMBIL DATA DB
    return view('admin.kelas.index', compact('kelas'));
    }

    public function create()
    {
        return view('admin.kelas.create');
    }

    public function store(Request $request)
    {
    $request->validate([
        'nama_kelas' => 'required',
        'program'    => 'required',
        'angkatan'   => 'required',
        'kuota'      => 'required|integer',
        'status'     => 'required',
    ]);

    Kelas::create([
        'nama_kelas' => $request->nama_kelas,
        'program'    => $request->program,
        'angkatan'   => $request->angkatan,
        'kuota'      => $request->kuota,
        'status'     => $request->status,
    ]);

    return redirect()->route('admin.kelas.index');
    }   


}

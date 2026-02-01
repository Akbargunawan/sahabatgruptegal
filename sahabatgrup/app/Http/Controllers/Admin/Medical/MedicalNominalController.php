<?php

namespace App\Http\Controllers\Admin\Medical;

use App\Http\Controllers\Controller;
use App\Models\MedicalNominal;
use Illuminate\Http\Request;

class MedicalNominalController extends Controller
{
    public function index()
    {
        $nominals = MedicalNominal::pluck('nominal', 'program');
        return view('admin.medical.atur-nominal', compact('nominals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jepang' => 'required|string',
            'korea'  => 'required|string',
        ]);

        // bersihkan format rupiah
        $jepang = (int) str_replace('.', '', $request->jepang);
        $korea  = (int) str_replace('.', '', $request->korea);

        MedicalNominal::updateOrCreate(
            ['program' => 'jepang'],
            ['nominal' => $jepang]
        );

        MedicalNominal::updateOrCreate(
            ['program' => 'korea'],
            ['nominal' => $korea]
        );

        return back()->with('success', 'Nominal medical berhasil disimpan');
    }

}

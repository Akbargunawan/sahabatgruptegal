<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CalonSiswa;
use Illuminate\Http\Request;
use App\Models\Kelas;

class CalonSiswaController extends Controller
{
    public function index(Request $request)
    {
        $query = CalonSiswa::query();

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        $calonSiswa = $query->latest()->get();

        return view('admin.calon-siswa.index', compact('calonSiswa'));
    }


   public function terima(Request $request, $id)
    {
        $request->validate([
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        $siswa = CalonSiswa::findOrFail($id);

        $siswa->update([
            'status' => 'diterima',
            'kelas_id' => $request->kelas_id,
        ]);

        // tambah jumlah terisi
        Kelas::where('id', $request->kelas_id)->increment('terisi');

        return redirect()->route('admin.calon-siswa.index')
            ->with('success', 'Siswa diterima dan kelas ditentukan');
    }


    public function tolak($id)
    {
        CalonSiswa::where('id', $id)->update([
            'status' => 'ditolak'
        ]);

        return redirect()->route('admin.calon-siswa.index')
            ->with('success', 'Calon siswa ditolak');
    }

   public function show($id)
    {
        $siswa = CalonSiswa::findOrFail($id);

        // ambil kelas aktif
        $kelasList = Kelas::where('status', 'aktif')->get();

        return view('admin.calon-siswa.show', compact('siswa', 'kelasList'));
    }

   public function destroy($id)
{
    $siswa = CalonSiswa::findOrFail($id);

    // Jika siswa sudah diterima dan punya kelas
    if ($siswa->status === 'diterima' && $siswa->kelas_id) {
        Kelas::where('id', $siswa->kelas_id)->decrement('terisi');
    }

    $siswa->delete();

    return redirect()->route('admin.calon-siswa.index')
        ->with('success', 'Data calon siswa berhasil dihapus');
}


}

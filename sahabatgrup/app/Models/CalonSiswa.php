<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalonSiswa extends Model
{
    use HasFactory;

    protected $table = 'calon_siswa';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'kategori_kelas', // ✅ WAJIB
        'ktp',
        'kartu_keluarga',
        'akta_lahir',
        'ijazah_terakhir',
        'bst',
        'buku_pelaut',
        'paspor',
        'sertifikat_lainnya',
        'status',
        'kelas_id',
    ];


    protected $hidden = [
        'password',
    ];

    public function kelas()
{
    return $this->belongsTo(\App\Models\Kelas::class);
}

public function medicalPayment()
{
    return $this->hasOne(MedicalPayment::class, 'calon_siswa_id');
}


}

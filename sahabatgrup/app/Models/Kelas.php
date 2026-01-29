<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';

    protected $fillable = [
        'nama_kelas',
        'program',
        'angkatan',
        'kuota',
        'terisi',
        'status',
    ];

    public function calonSiswa()
    {
    return $this->hasMany(CalonSiswa::class);
    }

}

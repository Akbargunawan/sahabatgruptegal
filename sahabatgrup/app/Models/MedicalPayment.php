<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalPayment extends Model
{
    use HasFactory;

    protected $table = 'medical_payments';

    protected $fillable = [
        'calon_siswa_id',
        'order_id',
        'amount',
        'payment_type',
        'status',

        // 🔥 TAMBAHKAN INI
        'jadwal_file',
        'medical_status',
        'hasil_file',
        'hasil_status',
    ];

    public function calonSiswa()
    {
        return $this->belongsTo(\App\Models\CalonSiswa::class, 'calon_siswa_id');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalNominal extends Model
{
    protected $fillable = ['program', 'nominal', 'keterangan'];
}

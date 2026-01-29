<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
        Schema::create('kelas', function (Blueprint $table) {
        $table->id();
        $table->string('nama_kelas');
        $table->string('program');
        $table->string('angkatan');
        $table->integer('kuota');
        $table->integer('terisi')->default(0);
        $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
        $table->timestamps();
    });

}

};

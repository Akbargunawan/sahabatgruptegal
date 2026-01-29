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
        Schema::create('calon_siswa', function (Blueprint $table) {
    $table->id();

    // data akun
    $table->string('name');
    $table->string('email')->unique();
    $table->string('phone');
    $table->string('password');

    // kategori pilihan user
    $table->enum('kategori_kelas', ['jepang', 'korea']);

    // dokumen
    $table->string('ktp');
    $table->string('kartu_keluarga');
    $table->string('akta_lahir');
    $table->string('ijazah_terakhir');
    $table->string('bst');
    $table->string('buku_pelaut');
    $table->string('paspor');
    $table->string('sertifikat_lainnya')->nullable();

    // proses admin
    $table->enum('status', ['pending', 'diterima', 'ditolak'])->default('pending');
    $table->unsignedBigInteger('kelas_id')->nullable(); // diisi admin

    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calon_siswa');
    }
};

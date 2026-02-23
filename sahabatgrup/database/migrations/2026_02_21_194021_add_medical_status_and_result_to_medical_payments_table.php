<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('medical_payments', function (Blueprint $table) {

            // rename kolom lama agar konsisten
            $table->renameColumn('jadwal_medical', 'jadwal_file');

            // status medical (tracking progres)
            $table->enum('medical_status', [
                'belum_dijadwalkan',
                'dijadwalkan',
                'selesai'
            ])->default('belum_dijadwalkan');

            // file hasil medical
            $table->string('hasil_file')->nullable();

            // hasil kelulusan
            $table->enum('hasil_status', [
                'lulus',
                'tidak_lulus'
            ])->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('medical_payments', function (Blueprint $table) {
            $table->renameColumn('jadwal_file', 'jadwal_medical');
            $table->dropColumn([
                'medical_status',
                'hasil_file',
                'hasil_status'
            ]);
        });
    }
};

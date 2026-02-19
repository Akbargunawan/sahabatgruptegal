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
        Schema::create('medical_payments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('calon_siswa_id')
                ->constrained('calon_siswa')
                ->cascadeOnDelete();

            $table->string('order_id')->unique();
            $table->integer('amount');
            $table->string('payment_type')->nullable();

            $table->enum('status', ['pending', 'lunas', 'gagal'])
                ->default('pending');

            $table->string('jadwal_medical')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_payments');
    }
};

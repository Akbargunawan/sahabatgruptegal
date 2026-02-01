<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('medical_nominals', function (Blueprint $table) {
            $table->id();
            $table->enum('program', ['jepang', 'korea'])->unique();
            $table->integer('nominal');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('medical_nominals');
    }
};

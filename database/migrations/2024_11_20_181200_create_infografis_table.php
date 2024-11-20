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
        Schema::create('infografis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Tambahkan kolom user_id
            $table->year('tahun');
            $table->integer('jumlah_penduduk');
            $table->integer('jumlah_kk');
            $table->integer('jumlah_pria');
            $table->integer('jumlah_perempuan');
            $table->timestamps();
            // Foreign key untuk user_id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infografis');
    }
};

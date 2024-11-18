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
        Schema::create('pengurus_desa', function (Blueprint $table) {
            $table->id();
            $table->string('nama');               // Nama pengurus
            $table->string('jabatan');            // Jabatan pengurus desa
            $table->string('telepon')->nullable(); // Nomor telepon, bisa kosong
            $table->enum('status', ['aktif', 'non-aktif'])->default('aktif'); // Status pengurus
            $table->string('gambar')->nullable();  // Kolom untuk menyimpan path gambar
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengurus_desa');
    }
};

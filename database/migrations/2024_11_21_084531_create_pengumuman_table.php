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
        Schema::create('pengumuman', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Relasi ke users [Jika pengguna dihapus, semua pengumuman yang dibuat oleh pengguna tersebut juga akan dihapus otomatis.]
                $table->string('judul'); // Judul pengumuman
                $table->string('media'); // File gambar atau dokumen (path)
                $table->timestamp('tanggal_publikasi'); // Tanggal publikasi
                $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengumuman');
    }
};

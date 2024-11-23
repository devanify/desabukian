<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    // Menentukan tabel yang digunakan
    protected $table = 'pengumuman';

    // Menentukan kolom yang dapat diisi (fillable)
    protected $fillable = [
        'judul',
        'slug',
        'keterangan',
        'media',
        'user_id', // Relasi dengan pengguna (admin, penulis)
        'tanggal_publikasi'
    ];

     // Relasi: Setiap pengumuman dimiliki oleh satu user
     public function user()
     {
         return $this->belongsTo(User::class);
     }
}

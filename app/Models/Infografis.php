<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Infografis extends Model
{

    protected $table = 'infografis';

    protected $fillable = [
        'user_id',
        'tahun',
        'jumlah_penduduk',
        'jumlah_kk',
        'jumlah_pria',
        'jumlah_perempuan',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengurusDesa extends Model
{
    protected $table = 'pengurus_desa';
    protected $fillable = [
        'nama', 
        'jabatan', 
        'telepon', 
        'gambar',
        'status'
    ];
}

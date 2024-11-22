<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVerify extends Model
{
    use HasFactory;

    protected $table = 'password_reset_tokens';

    protected $fillable = [
        'email',
        'token'
    ];

    // Menonaktifkan pengelolaan kolom `updated_at` (hanya gunakan `created_at`)
    public $timestamps = true; // Biarkan true agar `created_at` diatur otomatis
    const UPDATED_AT = null;  // Nonaktifkan kolom `updated_at
}

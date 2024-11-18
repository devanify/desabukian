<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Galeri extends Model
{
    protected $table = 'galeri';
    protected $fillable = [
        'user_id',
        'image_url',
        'description'
    ];

    // Definisikan hubungan ke model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

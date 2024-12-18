<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Evan',
            'email' => 'yanevan03@gmail.com',
            'email_verified_at' => now(), // Tanggal verifikasi email
            'password' => Hash::make('admin123'), // Menggunakan password yang sudah di-hash
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InfografisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menambahkan data pada tabel infografis
        DB::table('infografis')->insert([
            [
                'user_id' => 1, // Anda bisa menyesuaikan dengan id user yang ada
                'tahun' => 2024,
                'jumlah_penduduk' => 5000,
                'jumlah_kk' => 1200,
                'jumlah_pria' => 2500,
                'jumlah_perempuan' => 2500,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}

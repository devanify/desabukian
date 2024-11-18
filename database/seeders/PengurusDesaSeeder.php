<?php

namespace Database\Seeders;

use App\Models\PengurusDesa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengurusDesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pengurus = [
            ['jabatan' => 'Perbekel', 'nama' => 'I Made Junarta'],
            ['jabatan' => 'Sekretaris Desa', 'nama' => 'Drs. I Made Suartana'],
            ['jabatan' => 'Kasi Pemerintahan', 'nama' => 'I Made Nganu'],
            ['jabatan' => 'Kasi Kesra', 'nama' => 'I Ketut Kanta'],
            ['jabatan' => 'Kasi Pelayanan', 'nama' => 'I Made Krisna, S.Sos'],
            ['jabatan' => 'Kaur Tu dan Umum', 'nama' => 'Drs. I Putu Arnawa, S.H'],
            ['jabatan' => 'Kaur Keuangan', 'nama' => 'Ni Made Dewi Erawati'],
            ['jabatan' => 'Kaur Perencanaan', 'nama' => 'Ida Ayu Made Mahacinta'],
            ['jabatan' => 'Staf TU dan Umum', 'nama' => 'Dsk. Pt. Ella Ariadna, Sty. Par'],
            ['jabatan' => 'Staf Keuangan', 'nama' => 'Ni Wayan Yunik'],
            ['jabatan' => 'Kepala Dusun Bukian Kaja', 'nama' => 'I Wayan Suparta'],
            ['jabatan' => 'Kepala Dusun Bukian', 'nama' => 'I Wayan Suartika'],
            ['jabatan' => 'Kepala Dusun Bukian Kawan', 'nama' => 'I Kadek Budiartha'],
            ['jabatan' => 'Kepala Dusun Subilang', 'nama' => 'I Ketut Prawira'],
            ['jabatan' => 'Kepala Dusun Lebaha', 'nama' => 'I Wayan Darma'],
            ['jabatan' => 'Kepala Dusun Lebaah B', 'nama' => 'I Wayan Darma'],
            ['jabatan' => 'Kepala Dusun Tiyingan', 'nama' => 'Ngakan Putu Nurja'],
            ['jabatan' => 'Kepala Dusun Ulapan', 'nama' => 'Gusti Ngurah Candrayasa'],
            ['jabatan' => 'Kepala Dusun Tangkup', 'nama' => 'I Putu Suwena'],
            ['jabatan' => 'Kepala Dusun Amo', 'nama' => 'I Putu Karmita'],
            ['jabatan' => 'Kepala Dusun Dasong', 'nama' => 'I Made Astawa'],
        ];

        foreach ($pengurus as $data) {
            PengurusDesa::create($data);
        }
    }
}

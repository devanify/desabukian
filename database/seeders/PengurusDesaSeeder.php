<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\PengurusDesa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PengurusDesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pengurus = [
            ['jabatan' => 'Perbekel', 'nama' => 'I Made Junarta', 'status' => 'aktif', 'gambar' => 'Perbekel-I_Made_Junarta-3cfd3fcc-4cb3-417a-8679-0df7b01952bb.png'],
            ['jabatan' => 'Sekretaris Desa', 'nama' => 'Drs. I Made Suartana', 'status' => 'aktif', 'gambar' => 'Sekretaris_Desa-Drs._I_Made_Suartana-ef526f90-2293-433f-a991-6fb90187ec1a.jpg'],
            ['jabatan' => 'Kasi Pemerintahan', 'nama' => 'I Made Nganu', 'status' => 'aktif', 'gambar' => 'Kasi_Pemerintahan-I_Made_Nganu-61c2bc25-af45-40d4-a71d-bc62b16a4a83.jpg'],
            ['jabatan' => 'Kasi Kesra', 'nama' => 'I Ketut Kanta', 'status' => 'aktif', 'gambar' => 'Kasi_Kesra-I_Ketut_Kanta-3896f1a4-c304-4f61-b3be-fe395ec236b6.jpg'],
            ['jabatan' => 'Kasi Pelayanan', 'nama' => 'I Made Krisna, S.Sos', 'status' => 'aktif', 'gambar' => 'Kasi_Pelayanan-I_Made_Krisna,_S.Sos-1350c4f2-fde2-414a-a8d8-a6c81c6ef389.jpg'],
            ['jabatan' => 'Kaur Tu dan Umum', 'nama' => 'Drs. I Putu Arnawa, S.H', 'status' => 'aktif', 'gambar' => 'Kaur_Tu_dan_Umum-Drs._I_Putu_Arnawa,_S.H-1be73d85-9612-4254-a688-5ec426286ec4.jpg'],
            ['jabatan' => 'Kaur Keuangan', 'nama' => 'Ni Made Dewi Erawati', 'status' => 'non-aktif', 'gambar' => 'Kaur_Keuangan-Ni_Made_Dewi_Erawati-a922b04c-197b-49dc-8e14-474fbd0b89c2.jpg'],
            ['jabatan' => 'Kaur Perencanaan', 'nama' => 'Ida Ayu Made Mahacinta', 'status' => 'non-aktif', 'gambar' => 'Kaur_Perencanaan-Ida_Ayu_Made_Mahacinta-d302aef4-0464-4c44-8056-80335517c6d2.jpg'],
            ['jabatan' => 'Staf TU dan Umum', 'nama' => 'Dsk. Pt. Ella Ariadna, Sty. Par', 'status' => 'non-aktif', 'gambar' => 'Staf_TU_dan_Umum-Dsk._Pt._Ella_Ariadna,_Sty._Par-64b26911-e47f-4f1b-8b79-9d69b8072eb0.jpg'],
            ['jabatan' => 'Staf Keuangan', 'nama' => 'Ni Wayan Yunik', 'status' => 'non-aktif', 'gambar' => 'Staf_Keuangan-Ni_Wayan_Yunik-aa72176e-0810-496d-bdfe-5a4d30f6129b.jpg'],
            ['jabatan' => 'Kepala Dusun Bukian Kaja', 'nama' => 'I Wayan Suparta', 'status' => 'non-aktif', 'gambar' => 'Kepala_Dusun_Bukian_Kaja-I_Wayan_Suparta-80177d5d-5217-49a5-9e16-0f6f90d07c97.jpg'],
            ['jabatan' => 'Kepala Dusun Bukian', 'nama' => 'I Wayan Suartika', 'status' => 'non-aktif', 'gambar' => 'Kepala_Dusun_Bukian-I_Wayan_Suartika-71cb91c3-c058-4ecf-871a-0817c2dc8bc2.jpg'],
            ['jabatan' => 'Kepala Dusun Bukian Kawan', 'nama' => 'I Kadek Budiartha', 'status' => 'non-aktif', 'gambar' => 'Kepala_Dusun_Bukian_Kawan-I_Kadek_Budiartha-1bcd63aa-1988-4bd7-952b-f3fe9fc2fbd4.jpg'],
            ['jabatan' => 'Kepala Dusun Subilang', 'nama' => 'I Ketut Prawira', 'status' => 'non-aktif', 'gambar' => 'Kepala_Dusun_Subilang-I_Ketut_Prawira-6d021222-29dc-430c-a3e6-f57de9d6f990.jpg'],
            ['jabatan' => 'Kepala Dusun Lebah A', 'nama' => 'I Wayan Darma', 'status' => 'aktif', 'gambar' => 'Kepala_Dusun_Lebah_A-I_Wayan_Darma-94b14144-d46b-4168-82dd-ec9db698bd87.jpg'],
            ['jabatan' => 'Kepala Dusun Lebah B', 'nama' => 'I Wayan Darma', 'status' => 'non-aktif', 'gambar' => 'Kepala_Dusun_Lebaah_B-I_Wayan_Darma-b78f3298-0e62-4465-87f0-07b037f2c03f.jpg'],
            ['jabatan' => 'Kepala Dusun Tiyingan', 'nama' => 'Ngakan Putu Nurja', 'status' => 'non-aktif', 'gambar' => 'Kepala_Dusun_Tiyingan-Ngakan_Putu_Nurja-1a7e427d-b981-436b-b61c-1d380f709805.jpg'],
            ['jabatan' => 'Kepala Dusun Ulapan', 'nama' => 'Gusti Ngurah Candrayasa', 'status' => 'non-aktif', 'gambar' => 'Kepala_Dusun_Ulapan-Gusti_Ngurah_Candrayasa-c93c0d66-9d40-4265-8102-2ac76ad2420e.jpg'],
            ['jabatan' => 'Kepala Dusun Tangkup', 'nama' => 'I Putu Suwena', 'status' => 'non-aktif', 'gambar' => 'Kepala_Dusun_Tangkup-I_Putu_Suwena-a5e8041b-3ac9-42db-a412-3839ec9c24fe.jpg'],
            ['jabatan' => 'Kepala Dusun Amo', 'nama' => 'I Putu Karmita', 'status' => 'non-aktif', 'gambar' => 'Kepala_Dusun_Amo-I_Putu_Karmita-fdca660e-bd7f-4cd8-8dbf-ba93c5133d4a.jpg'],
            ['jabatan' => 'Kepala Dusun Dasong', 'nama' => 'I Made Astawa', 'status' => 'non-aktif', 'gambar' => 'Kepala_Dusun_Dasong-I_Made_Astawa-ec030f35-7f01-4d00-9a08-e621fb552b33.jpg'],
        ];

        foreach ($pengurus as $data) {
            DB::table('pengurus_desa')->insert([
                'nama' => $data['nama'],
                'jabatan' => $data['jabatan'],
                'telepon' => null,
                'status' => $data['status'],
                'gambar' => $data['gambar'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
    }}
}

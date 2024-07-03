<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jabatan::create(['nama' => 'Kepala Sekretariat Utama']);
        Jabatan::create(['nama' => 'Penyusun Laporan Keuangan']);
        Jabatan::create(['nama' => 'Surveyor Pemetaan Pertama']);
        Jabatan::create(['nama' => 'Analis Data Survei dan Pemetaan']);
        Jabatan::create(['nama' => 'Perancang Per-UU-an Utama IV/e']);
        Jabatan::create(['nama' => 'Kepala Biro Perencanaan, Kepegawaian, dan Hukum']);
        Jabatan::create(['nama' => 'Widyaiswara Utama IV/e']);
        Jabatan::create(['nama' => 'Analis Kepegawaian Madya IV/e']);
    }
}

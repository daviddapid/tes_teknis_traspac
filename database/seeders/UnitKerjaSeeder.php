<?php

namespace Database\Seeders;

use App\Models\UnitKerja;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UnitKerja::create(['nama' => 'BNBP']);
        UnitKerja::create(['nama' => 'Kementrian']);
        UnitKerja::create(['nama' => 'Riset dan Teknologi']);
    }
}
<?php

namespace Database\Seeders;

use App\Models\Golongan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GolonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Golongan::create(['tingkat' => 'I', 'tipe' => 'a']);
        Golongan::create(['tingkat' => 'I', 'tipe' => 'b']);
        Golongan::create(['tingkat' => 'I', 'tipe' => 'c']);

        Golongan::create(['tingkat' => 'II', 'tipe' => 'a']);
        Golongan::create(['tingkat' => 'II', 'tipe' => 'b']);
        Golongan::create(['tingkat' => 'II', 'tipe' => 'c']);

        Golongan::create(['tingkat' => 'III', 'tipe' => 'a']);
        Golongan::create(['tingkat' => 'III', 'tipe' => 'b']);
        Golongan::create(['tingkat' => 'III', 'tipe' => 'c']);

        Golongan::create(['tingkat' => 'IV', 'tipe' => 'a']);
        Golongan::create(['tingkat' => 'IV', 'tipe' => 'b']);
        Golongan::create(['tingkat' => 'IV', 'tipe' => 'c']);
        Golongan::create(['tingkat' => 'IV', 'tipe' => 'd']);
    }
}

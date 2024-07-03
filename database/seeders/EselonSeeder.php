<?php

namespace Database\Seeders;

use App\Models\Eselon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EselonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Eselon::create(['tingkat' => 'I']);
        Eselon::create(['tingkat' => 'II']);
        Eselon::create(['tingkat' => 'III']);
        Eselon::create(['tingkat' => 'IV']);
        Eselon::create(['tingkat' => 'V']);
    }
}

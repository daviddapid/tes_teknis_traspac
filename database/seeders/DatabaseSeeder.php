<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create(['username' => 'admin', 'password' => 'password']);
        $this->call(AgamaSeeder::class);
        $this->call(EselonSeeder::class);
        $this->call(GolonganSeeder::class);
        $this->call(JabatanSeeder::class);
        $this->call(JenisKelaminSeeder::class);
        $this->call(UnitKerjaSeeder::class);

        // Pegawai::factory(100)->create();

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

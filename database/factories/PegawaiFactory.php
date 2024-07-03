<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pegawai>
 */
class PegawaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $locale = 'id_ID';

        return [
            'nip' => fake($locale)->randomNumber(9),
            'nama' => fake($locale)->name(),
            'tempat_lahir' => fake($locale)->streetName(),
            'alamat' => fake($locale)->streetAddress(),
            'tgl_lahir' => fake($locale)->date(),
            'tempat_tugas' => fake($locale)->streetName(),
            'no_hp' => fake($locale)->phoneNumber(),
            'npwp' => fake($locale)->randomNumber(9),
            // 'foto' => fake($locale)->image(public_path('storage/foto-pegawai'), 50, 10, null, true, false, null, false, 'jpg'),
            // 'foto' => fake($locale)->imageUrl(80, 30, null, false, null, false, 'jpg'),
            'unit_kerja_id' => fake($locale)->numberBetween(1, 3),
            'eselon_id' => fake($locale)->numberBetween(1, 5),
            'golongan_id' => fake($locale)->numberBetween(1, 13),
            'agama_id' => fake($locale)->numberBetween(1, 6),
            'jabatan_id' => fake($locale)->numberBetween(1, 8),
            'jenis_kelamin_id' => fake($locale)->numberBetween(1, 2),
        ];
    }
}

<?php

use App\Models\Agama;
use App\Models\Eselon;
use App\Models\Golongan;
use App\Models\Jabatan;
use App\Models\JenisKelamin;
use App\Models\UnitKerja;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('nip');
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->string('alamat');
            $table->date('tgl_lahir');
            $table->string('tempat_tugas');
            $table->string('no_hp');
            $table->string('npwp');
            $table->string('foto');
            $table->foreignIdFor(UnitKerja::class)->constrained();
            $table->foreignIdFor(Eselon::class)->constrained();
            $table->foreignIdFor(Golongan::class)->constrained();
            $table->foreignIdFor(Agama::class)->constrained();
            $table->foreignIdFor(Jabatan::class)->constrained();
            $table->foreignIdFor(JenisKelamin::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};

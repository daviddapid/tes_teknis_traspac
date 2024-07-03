<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    function agama()
    {
        return $this->belongsTo(Agama::class);
    }
    function eselon()
    {
        return $this->belongsTo(Eselon::class);
    }
    function golongan()
    {
        return $this->belongsTo(Golongan::class);
    }
    function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
    function jenisKelamin()
    {
        return $this->belongsTo(JenisKelamin::class);
    }
    function unitKerja()
    {
        return $this->belongsTo(UnitKerja::class);
    }
}

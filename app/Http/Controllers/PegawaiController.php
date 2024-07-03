<?php

namespace App\Http\Controllers;

use App\Exports\PegawaisExport;
use App\Http\Requests\StorePegawaiRequest;
use App\Http\Requests\UpdatePegawaiRequest;
use App\Models\Agama;
use App\Models\Eselon;
use App\Models\Golongan;
use App\Models\Jabatan;
use App\Models\JenisKelamin;
use App\Models\Pegawai;
use App\Models\UnitKerja;
use App\Utils\StorageUtils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pegawais = $this->filterPegawai($request);
        if ($request->paginate != 'semua') {
            $pegawais->appends($request->query());
        }

        return view('pages.pegawai.index', [
            'pegawais' => $pegawais,
            'unit_kerjas' => UnitKerja::all(),
            'eselons' => Eselon::all(),
            'golongans' => Golongan::all()->groupBy('tingkat'),
            'agamas' => Agama::all(),
            'jabatans' => Jabatan::all(),
            'jenis_kelamins' => JenisKelamin::all(),
            'total_pegawai' => Pegawai::count(),
            'params' => (object) $request->query()
        ]);
    }

    public function cetakExcel(Request $request)
    {
        $pegawais = $this->filterPegawai($request);
        if ($request->paginate != 'semua') {
            $pegawais->appends($request->query());
        }
        return Excel::download(new PegawaisExport($pegawais), 'pegawai-export.xlsx');

        // $pegawais = $this->filterPegawai($request);
        // if ($request->paginate != 'semua') {
        //     $pegawais->appends($request->query());
        // }

        // return view('pages.pegawai.excel', ['pegawais' => $pegawais]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.pegawai.create', [
            'unit_kerjas' => UnitKerja::all(),
            'eselons' => Eselon::all(),
            'golongans' => Golongan::all()->groupBy('tingkat'),
            'agamas' => Agama::all(),
            'jabatans' => Jabatan::all(),
            'jenis_kelamins' => JenisKelamin::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePegawaiRequest $request)
    {
        $validated_data = $request->validated();
        $validated_data['foto'] = StorageUtils::saveFile($request, 'foto-pegawai');

        Pegawai::create($validated_data);

        alert('Sukses', 'sukses menambah data pegawai baru', 'success');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegawai $pegawai)
    {
        return view('pages.pegawai.edit', [
            'pegawai' => $pegawai,
            'unit_kerjas' => UnitKerja::all(),
            'eselons' => Eselon::all(),
            'golongans' => Golongan::all()->groupBy('tingkat'),
            'agamas' => Agama::all(),
            'jabatans' => Jabatan::all(),
            'jenis_kelamins' => JenisKelamin::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePegawaiRequest $request, Pegawai $pegawai)
    {
        $validated_data = $request->validated();
        if ($request->file('foto')) {
            // delete old image
            StorageUtils::deleteFile($pegawai->foto);

            // save new image
            $validated_data['foto'] = StorageUtils::saveFile($request, 'foto-pegawai');
        } else {
            unset($validated_data['foto']);
        }

        $pegawai->update($validated_data);

        alert('Sukses', 'sukses memperbarui data pegawai', 'success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $pegawai)
    {
        StorageUtils::deleteFile($pegawai->foto);
        $pegawai->delete();

        alert('Sukses', 'sukses menghapurs data pegawai', 'success');
        return back();
    }

    private function filterPegawai(Request $request)
    {
        $p = Pegawai::query()->with(['agama', 'eselon', 'golongan', 'jabatan', 'jenisKelamin', 'unitKerja']);

        if ($request->nip) $p->where('nip', 'like', '%' . $request->nip . '%');
        if ($request->nama) $p->where('nama', 'like', '%' . $request->nama . '%');
        if ($request->tempat_lahir) $p->where('tempat_lahir', 'like', '%' . $request->tempat_lahir . '%');
        if ($request->alamat) $p->where('alamat', 'like', '%' . $request->alamat . '%');
        if ($request->tgl_lahir) $p->where('tgl_lahir', $request->tgl_lahir);
        if ($request->tempat_tugas) $p->where('tempat_tugas', 'like', '%' . $request->tempat_tugas . '%');
        if ($request->no_hp) $p->where('no_hp', 'like', '%' . $request->no_hp . '%');
        if ($request->npwp) $p->where('npwp', 'like', '%' . $request->npwp . '%');
        if ($request->unit_kerja_id) $p->where('unit_kerja_id', $request->unit_kerja_id);
        if ($request->eselon_id) $p->where('eselon_id', $request->eselon_id);
        if ($request->golongan_id) $p->where('golongan_id', $request->golongan_id);
        if ($request->agama_id) $p->where('agama_id', $request->agama_id);
        if ($request->jabatan_id) $p->where('jabatan_id', $request->jabatan_id);
        if ($request->jenis_kelamin_id) $p->where('jenis_kelamin_id', $request->jenis_kelamin_id);

        if ($request->paginate == 'semua') {
            $pegawais = $p->latest()->get();
        } else {
            $pegawais = $p->latest()->paginate($request->paginate ?? 10);
        }

        return $pegawais;
    }
}

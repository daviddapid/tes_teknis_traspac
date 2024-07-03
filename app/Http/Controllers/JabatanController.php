<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJabatanRequest;
use App\Http\Requests\UpdateJabatanRequest;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.jabatan.index', [
            'jabatans' => Jabatan::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJabatanRequest $request)
    {
        Jabatan::create($request->validated());

        toast('sukses menambah data baru', 'success', 'top-right');
        return back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJabatanRequest $request, Jabatan $jabatan)
    {
        $jabatan->update($request->validated());

        toast('sukses memperbarui data', 'success', 'top-right');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jabatan $jabatan)
    {
        try {
            $jabatan->delete();
            toast('sukses menghapus data', 'success', 'top-right');
        } catch (\Exception $e) {
            toast($e->getMessage(), 'error', 'top-right');
        }
        return back();
    }
}

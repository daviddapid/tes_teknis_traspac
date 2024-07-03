<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUnitKerjaRequest;
use App\Http\Requests\UpdateUnitKerjaRequest;
use App\Models\UnitKerja;
use Illuminate\Http\Request;

class UnitKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.unit-kerja.index', [
            'unit_kerjas' => UnitKerja::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUnitKerjaRequest $request)
    {
        UnitKerja::create($request->validated());

        toast('sukses menambah data baru', 'success', 'top-right');
        return back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUnitKerjaRequest $request, UnitKerja $unitKerja)
    {
        $unitKerja->update($request->validated());

        toast('sukses memperbarui data', 'success', 'top-right');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UnitKerja $unitKerja)
    {
        try {
            $unitKerja->delete();
            toast('sukses menghapus data', 'success', 'top-right');
        } catch (\Exception $e) {
            toast($e->getMessage(), 'error', 'top-right');
        }
        return back();
    }
}

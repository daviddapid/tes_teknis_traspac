<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGolonganRequest;
use App\Http\Requests\UpdateGolonganRequest;
use App\Models\Golongan;
use Illuminate\Http\Request;

class GolonganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.golongan.index', [
            'golongans' => Golongan::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGolonganRequest $request)
    {
        Golongan::create($request->validated());

        toast('Sukses menambah data baru', 'success', 'top-right');
        return back();
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGolonganRequest $request, Golongan $golongan)
    {
        $golongan->update($request->validated());

        toast('Sukses memperbarui data', 'success', 'top-right');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Golongan $golongan)
    {
        try {
            $golongan->delete();
            toast('Sukses menghapus data', 'success', 'top-right');
        } catch (\Exception $e) {
            toast($e->getMessage(), 'error', 'top-right');
        }
        return back();
    }
}

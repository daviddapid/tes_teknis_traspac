<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJenisKelaminRequest;
use App\Http\Requests\UpdateJenisKelaminRequest;
use App\Models\JenisKelamin;
use Illuminate\Http\Request;

class JenisKelaminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.jenis-kelamin.index', [
            'jenis_kelamins' => JenisKelamin::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJenisKelaminRequest $request)
    {
        JenisKelamin::create($request->validated());

        toast('sukses menambah data baru', 'success', 'top-right');
        return back();
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJenisKelaminRequest $request, JenisKelamin $jenisKelamin)
    {
        $jenisKelamin->update($request->validated());

        toast('sukses memperbarui data', 'success', 'top-right');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisKelamin $jenisKelamin)
    {
        try {
            $jenisKelamin->delete();
            toast('sukses memperbarui data', 'success', 'top-right');
        } catch (\Exception $e) {
            toast($e->getMessage(), 'error', 'top-right');
        }
        return back();
    }
}

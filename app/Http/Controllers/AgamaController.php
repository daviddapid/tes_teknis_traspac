<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAgamaRequest;
use App\Http\Requests\UpdateAgamaRequest;
use App\Models\Agama;
use Illuminate\Http\Request;

class AgamaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.agama.index', [
            'agamas' => Agama::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAgamaRequest $request)
    {
        Agama::create($request->validated());

        toast('Sukses menambah data', 'success', 'top-right');
        return back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAgamaRequest $request, Agama $agama)
    {
        $agama->update($request->validated());

        toast('Sukses memperbarui data', 'success', 'top-right');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agama $agama)
    {
        try {
            $agama->delete();
            toast('Sukses menghapus data', 'success', 'top-right');
        } catch (\Exception $e) {
            toast($e->getMessage(), 'error', 'top-right');
            // toast('Gagal menghapus data (integrity constraint)', 'error', 'top-right');
            return back();
        }


        return back();
    }
}

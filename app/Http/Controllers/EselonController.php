<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEselonRequest;
use App\Http\Requests\UpdateEselonRequest;
use App\Models\Eselon;
use Illuminate\Http\Request;

class EselonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.eselon.index', [
            'eselons' => Eselon::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEselonRequest $request)
    {
        Eselon::create($request->validated());

        toast('Sukses menambah data', 'success', 'top-right');
        return back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEselonRequest $request, Eselon $eselon)
    {
        $eselon->update($request->validated());

        toast('Sukses memperbarui data', 'success', 'top-right');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Eselon $eselon)
    {
        try {
            $eselon->delete();
            toast('Sukses menghapus data', 'success', 'top-right');
        } catch (\Exception $e) {
            toast($e->getMessage(), 'error', 'top-right');
        }
        return back();
    }
}

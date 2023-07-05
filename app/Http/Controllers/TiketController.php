<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'tiket_type' => 'required',
            'nama' => 'required',
            'nik' => 'required',
        ]);

        $tiket = new Tiket();
        $tiket->nama = $request->nama;
        $tiket->nik = $request->nik;
        $tiket->tiket_type = $request->tiket_type;
        $tiket->status = 'belum masuk';

        $id_tiket = uniqid();
        $tiket->id_tiket = $id_tiket;
        $tiket->save();

        return redirect()->route('home')->with('pesan', $id_tiket);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tiket $tiket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tiket $tiket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tiket $tiket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tiket $tiket)
    {
        //
    }
}

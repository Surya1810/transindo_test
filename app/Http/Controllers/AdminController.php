<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Tiket;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.index');
    }
    public function pemesanan()
    {
        $pemesanan = Tiket::all();
        return view('dashboard.admin.pemesanan', compact('pemesanan'));
    }
    public function laporan()
    {
        $pemesanan = Tiket::all();
        return view('dashboard.admin.laporan', compact('pemesanan'));
    }
    public function check_in()
    {
        return view('dashboard.admin.check_in');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
    }

    public function pemesanan_edit($id)
    {
        $data = Tiket::find($id);
        // dd($data);
        return view('dashboard.admin.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    public function pemesanan_update($id, Request $request)
    {
        $data = Tiket::find($id);
        $data->nama = $request->nama;
        $data->nik = $request->nik;
        $data->id_tiket = $request->id_tiket;
        $data->save();

        return redirect()->route('pemesanan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }

    public function pemesanan_destroy($id)
    {
        $data = Tiket::find($id);
        $data->status = 'dihapus';
        $data->save();

        return redirect()->route('pemesanan')->with(['pesan' => 'Data Berhasil Dihapus', 'level-alert' => 'alert-danger']);
    }

    public function checked(Request $request)
    {
        $checked = Tiket::where('id_tiket', $request->id_tiket)->first();

        if ($checked == null) {
            $hasil = 'kosong';
            return view('dashboard.admin.check_in', compact('hasil'));
        } else {
            $hasil = $checked;

            return view('dashboard.admin.check_in', compact('hasil'));
        }
    }

    public function masuk($id)
    {
        $checked = Tiket::find($id);

        $checked->status = 'masuk';
        $checked->save();

        return view('dashboard.admin.check_in');
    }
}

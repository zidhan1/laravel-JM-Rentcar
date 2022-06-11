<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mobil;

class MobilController extends Controller
{
    public function viewMobil()
    {
        $data = Mobil::simplePaginate(5);
        return view('admin.mobil', ['dataMobil' => $data]);
    }

    public function tambahMobil()
    {
        return view('admin.create');
    }

    public function storeMobil(Request $request)
    {
        $data = new Mobil;
        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('img/car/', $request->file('gambar')->getClientOriginalName());
            $data->nama = $request->nama;
            $data->merek = $request->merk;
            $data->tahun = $request->tahun;
            $data->harga = $request->harga;
            $data->gambar = $request->file('gambar')->getClientOriginalName();
            $data->deskripsi = $request->desk;
            $data->status = $request->status;
            $data->save();
            return redirect('admin/datamobil');
        }
    }

    public function editMobil($id)
    {
        $data = Mobil::find($id);
        return view('admin.edit', compact('data'));
    }

    public function updateMobil(Request $request, $id)
    {
        $data = Mobil::find($id);
        $data->nama = $request->nama;
        $data->merek = $request->merk;
        $data->tahun = $request->tahun;
        $data->harga = $request->harga;
        $data->gambar = $request->gambar;
        $data->deskripsi = $request->desk;
        $data->status = $request->status;
        $data->update();
        return redirect('admin/datamobil');
    }

    public function mobilDestroy($id)
    {
        $data = Mobil::find($id);
        $data->delete();
        return redirect('admin/datamobil');
    }
}

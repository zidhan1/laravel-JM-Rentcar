<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Mobil;
use App\Models\Ulasan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    //  
    function tambahSewa($id)
    {
        $data = Mobil::find($id);
        return view('user.create', compact('data'));
    }

    function store(Request $request, $id)
    {
        $mobil = Mobil::find($id);
        $data = new Transaksi;
        $user = Auth()->user();
        if ($request->hasFile('bukti')) {
            $request->file('bukti')->move('img/bukti/', $request->file('bukti')->getClientOriginalName());
            $data->id_user = $user->id;
            $data->id_mobil = $mobil->id;
            $data->tgl_sewa = $request->tgl_sewa;
            $data->tgl_kembali = $request->tgl_kembali;
            $data->pembayaran = $request->pembayaran;
            $data->jaminan = $request->jaminan;
            $data->bukti = $request->file('bukti')->getClientOriginalName();
            $data->save();
            return redirect('/cars');
        }
    }

    function viewTransaksi()
    {
        $data = Transaksi::simplePaginate(5);
        return view('admin.transaksi', ['data' => $data]);
    }

    public function deleteTransaksi($id)
    {
        $data = Transaksi::find($id);
        $data->delete();
        return redirect('admin/transaksi');
    }

    function viewDeskripsi($id)
    {
        $data = Mobil::find($id);
        $ulasan = Ulasan::where('id_mobil', '=', $data->id)->get();
        $hasil = Ulasan::where('id_mobil', '=', $data->id)->count();
        return view('user.deskripsi', compact('data', 'ulasan', 'hasil'));
    }

    function tambahUlasan(Request $request, $id)
    {
        $mobil = Mobil::find($id);
        $user = Auth()->user();
        $data = new Ulasan;
        $data->id_user = $user->id;
        $data->id_mobil = $mobil->id;
        $data->nama = $request->nama;
        $data->ulasan = $request->ulasan;
        $data->save();
        return redirect('/cars');
    }
}

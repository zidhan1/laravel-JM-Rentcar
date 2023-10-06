<?php

namespace App\Http\Controllers\User;

use Midtrans;
use Midtrans\Snap;
use Veritrans_Snap;
use App\Models\User;
use Midtrans\Config;
use App\Models\Mobil;
use Veritrans_Config;
use App\Models\Ulasan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    //  
    function __construct()
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-Ygclue2isLq0wmkhdZbiaIYB';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
    }

    function tambahSewa($id)
    {
        $data = Mobil::find($id);

        return view('user.create', compact('data'));
    }

    function store(Request $request, $id)
    {
        $data = Mobil::find($id);
        $user = Auth()->user();

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $data->harga,
            ),
            'item_details' => array(
                [
                    'id' => $data->id,
                    'price' => $data->harga,
                    'quantity' => $request->get('jml_hari'),
                    'name' => $data->nama
                ]
            ),
            'customer_details' => array(
                'first_name' => $user->name,
                'last_name' => '',
                'email' => $user->email,
                'phone' => '',
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('user.payment', compact('data', 'snapToken'));
    }

    public function payment_post(Request $request, $id)
    {
        $data = Mobil::find($id);
        $user = Auth()->user();
        $json = json_decode($request->get('json'));
        $trans = new Transaksi();

        $trans->id_user = $user->id;
        $trans->id_mobil = $data->id;
        $trans->tgl_sewa = $request->get('tgl_sewa');
        $trans->tgl_kembali = $request->get('tgl_kembali');
        $trans->amount = $data->harga * $request->get('jml_hari');
        $trans->jaminan = $request->get('jaminan');
        $trans->status = $json->transaction_status;
        $trans->invoice = $json->pdf_url;
        $trans->save();
        return redirect('/cars');
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

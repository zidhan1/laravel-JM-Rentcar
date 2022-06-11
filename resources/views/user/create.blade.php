@extends('layouts.app')

@section('title','JM Rentcar')

@section('content')

<div class="container-fluid">
    <form action="{{route('sewa.store',$data->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Tanggal Sewa</label>
                    <input type="date" class="form-control" name="tgl_sewa" id="tgl_sewa">
                </div>
                <div class="form-group">
                    <label>Tanggal Pengembalian</label>
                    <input type="date" class="form-control" name="tgl_kembali" id="tgl_kembali">
                </div>
                <div class="form-group">
                    <label>Metode Pembayaran</label>
                    <select name="pembayaran" id="pembayaran" class="form-control">
                        <option value="BANK BCA">BANK BCA</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Jaminan</label>
                    <select name="jaminan" id="jaminan" class="form-control">
                        <option value="KTP">KTP</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Bukti Transfer</label>
                    <input type="file" class="form-control" name="bukti" id="bukti">
                </div>
            </div>
            <div class="col-md-4 mt-3">
                <div class="card card-bordered" style="width: 19rem; height:12rem;">
                    <p style="margin-left:1.5rem;" class="fw-bold mt-2">Pembayaran Via Transfer BANK BCA</p>
                    <p style="margin-left:1.5rem; font-style:oblique;">No Rek: <br>6880010091<br>A/N<BR>FERINA SOFYAN</p>
                </div>
            </div>
            <div>
                <br>
                <button type="submit" class="btn btn-info">Checkout</button>
                <a href="{{url('/home')}}" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </form>
</div>

@endsection
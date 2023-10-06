@extends('layouts.app')

@section('title','JM Rentcar')

@section('content')

<div class="container-fluid">
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-9Kth_vn9qLnTLdae"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <form action="{{route('user.payment',  $data->id)}}" method="GET" id="sewa_form">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Jumlah hari sewa</label>
                    <input type="number" class="form-control" name="jml_hari" id="jml_hari">
                </div>
                <div class="form-group">
                    <label>Tanggal Sewa</label>
                    <input type="date" class="form-control" name="tgl_sewa" id="tgl_sewa">
                </div>
                <div class="form-group">
                    <label>Tanggal Pengembalian</label>
                    <input type="date" class="form-control" name="tgl_kembali" id="tgl_kembali">
                </div>
                <div class="form-group">
                    <label>Jaminan</label>
                    <select name="jaminan" id="jaminan" class="form-control">
                        <option value="KTP">KTP</option>
                    </select>
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
    <br>
</div>


@endsection
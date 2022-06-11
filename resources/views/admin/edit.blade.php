@extends('layouts.master')

@section('tittle','Sistem JM Rentcar')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Sistem JM Rentcar</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Tambah Data Mobil</li>
    </ol>
    <div class="card-body">
        <form action="{{route('admin.update',$data->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Nama Kendaraan</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="{{$data->nama}}">
                    </div>
                    <div class="form-group">
                        <label>Merk</label>
                        <input type="text" class="form-control" name="merk" id="merk" value="{{$data->merek}}">
                    </div>
                    <div class="form-group">
                        <label>Tahun</label>
                        <input type="text" class="form-control" name="tahun" id="tahun" value="{{$data->tahun}}">
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" class="form-control" name="harga" id="harga" value="{{$data->harga}}">
                    </div>
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" class="form-control" name="gambar" id="gambar" value="{{$data->gambar}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="desk">Deskripsi</label>
                        <br>
                        <textarea name="desk" id="desk" cols="40" rows="9" value="{{$data->deskripsi}}">{{$data->deskripsi}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" id="status" value="{{$data->status}}">
                            <option value="Ready">Ready</option>
                            <option value="Booked">Booked</option>
                        </select>
                    </div>
                </div>
                <div>
                    <br>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{url('/admin/datamobil')}}" class="btn btn-success">Kembali</a>
                </div>
        </form>
    </div>

    @endsection
@extends('layouts.master')

@section('tittle','Sistem JM Rentcar')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Sistem JM Rentcar</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Tambah Data Mobil</li>
    </ol>
    <div class="card-body">
        <form action="{{route('admin.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Nama Kendaraan</label>
                        <input type="text" class="form-control" name="nama" id="nama">
                    </div>
                    <div class="form-group">
                        <label>Merk</label>
                        <input type="text" class="form-control" name="merk" id="merk">
                    </div>
                    <div class="form-group">
                        <label>Tahun</label>
                        <input type="text" class="form-control" name="tahun" id="tahun">
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" class="form-control" name="harga" id="harga">
                    </div>
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" class="form-control" name="gambar" id="gambar">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="desk">Deskripsi</label>
                        <br>
                        <textarea name="desk" id="desk" cols="40" rows="9"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" id="status">
                            <option value="Ready">Ready</option>
                            <option value="Booked">Booked</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3 mt-4">
                    <div class="card card-bordered" style="width: 19rem; height:10rem;">
                        <p style="margin-left:1.5rem;" class="fw-bold">Note : </p>
                        <p style="margin-left:1.5rem;">* Harap isi seusai ketentuan yang ada.</p>
                        <p style="margin-left:1.5rem;">* Pastikan klik tombol simpan.</p>
                    </div>
                </div>
                <div>
                    <br>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{url('/admin/datamobil')}}" class="btn btn-success">Kembali</a>
                </div>
        </form>
    </div>
</div>

@endsection
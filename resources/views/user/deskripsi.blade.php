@extends('layouts.app')

@section('title','JM Rentcar')

@section('content')

<div class="container-fluid">
    <div class="card" style="margin-left: 80px; width: 65rem; margin-top:30px;">
        <div class="card-header">
            Deskripsi Kendaraan
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6 mb-3">
                    <img src="{{asset('img/car/'.$data->gambar)}}" alt="" style="width:420px; height:350px;">
                </div>
                <div class="col-6">
                    <p>Nama Mobil : {{$data->nama}} <br>
                        Tahun Rilis : {{$data->tahun}} <br>
                        {{$data->deskripsi}}
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-3 mb-3">
                    <a href="" class="btn btn-outline-danger"> Sewa Sekarang</a>
                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="card" style="margin-left: 80px; width: 65rem; margin-top:30px;">
                <div class="card-body">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="true" href="#">Ulasan</a>
                        </li>
                    </ul>
                    @if ($hasil > 0)
                    @foreach($ulasan as $record)
                    <h5 class="card-title mt-3">{{$record->nama}}</h5>
                    <p class="card-text mb-3">{{$record->ulasan}}⭐</p>
                    @endforeach
                    @endif
                    <div class="mt-3">
                        <form action="{{route('deskripsi.store',$data->id)}}" class="form-group" method="post" enctype="multipart/form-data">
                            @csrf
                            <label for="nama">Masukkan Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control">
                            <label for="ulasan">Masukkan Ulasan</label>
                            <textarea class="form-control" name="ulasan" id="ulasan" cols="30" rows="8">

                            </textarea>
                            <button type="submit" class="btn btn-outline-primary">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@extends('layouts.master')

@section('tittle','Sistem JM Rentcar')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Sistem JM Rentcar</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Data Mobil</li>
    </ol>
    <div class="row">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Mobil JM Rentcar
            </div>
            <div class="card-body">
                <a href="" class="btn btn-primary">+Tambah Data</a>
                <br><br>
                <table id="datatablesSimple" class="table-bordered table-hoover table-striped mb-3">
                    <thead>
                        <tr class="text-center">
                            <th style="width:2%;">No</th>
                            <th style="width:2%;">ID CS</th>
                            <th style="width:8%;">Tanggal Sewa</th>
                            <th style="width:8%;">Tanggal Kembali</th>
                            <th style="width:6%;">Payment</th>
                            <th style="width:5%;">Jaminan</th>
                            <th style="width:8%;">Bukti</th>
                            <th style="width:6%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach($data as $dataTransaksi)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$dataTransaksi->id_user}}</td>
                            <td>{{$dataTransaksi->tgl_sewa}}</td>
                            <td>{{$dataTransaksi->tgl_kembali}}</td>
                            <td>{{$dataTransaksi->pembayaran}}</td>
                            <td>{{$dataTransaksi->jaminan}}</td>
                            <td><img src="{{asset('img/bukti/'.$dataTransaksi->bukti)}}" alt="" style="width:40px; height:40px;"></td>
                            <td>
                                <form action="{{route('destroy.transaksi', $dataTransaksi->id)}}" method="post">
                                    @csrf
                                    <button onClick="return confirm('Yakin Hapus Data?')" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
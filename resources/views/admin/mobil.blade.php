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
                <a href="{{url('admin/tambahmobil')}}" class="btn btn-primary">+Tambah Data</a>
                <br><br>
                <table id="tabel-produk" class="table-bordered table-hoover table-striped mb-3">
                    <thead>
                        <tr class="text-center">
                            <th style="width:3%;">No</th>
                            <th style="width:8%;">Nama Mobil</th>
                            <th style="width:10%;">Merek</th>
                            <th style="width:8%;">Tahun</th>
                            <th style="width:10%;">Harga</th>
                            <th style="width:10%;">Status</th>
                            <th style="width:8%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach($dataMobil as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->nama}}</td>
                            <td>{{$data->merek}}</td>
                            <td>{{$data->tahun}}</td>
                            <td>{{number_format($data->harga, 0,',','.')}}</td>
                            <td>{{$data->status}}</td>
                            <td>
                                <form action="{{route('admin.destroy', $data->id)}}" method="post">
                                    @csrf
                                    <a href="{{route('admin.edit',$data->id)}}" class="btn btn-warning">Edit</a>
                                    <button onClick="return confirm('Yakin Hapus Data?')" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $dataMobil->onEachSide(5)->links() }}
            </div>
        </div>
    </div>
</div>
@stop
@push('scripts')
<script>
    $(function() {
        $('#tabel-produk').DataTable();
    });
</script>
@endpush
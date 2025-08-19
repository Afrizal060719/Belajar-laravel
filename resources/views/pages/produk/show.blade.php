@extends('layouts.master')

@section('konten')
<h1>Selamat Datang Di produk</h1>
<hr>
<a href="/product/create" type="button" class="btn btn-primary mb-4">Tambah Data</a>
<div class="alert alert-primary">
    <b>Nama Toko : </b> {{$data_toko['nama_toko']}}
    <br>
    <b>Alamat : </b> {{$data_toko['alamat']}}
    <br>
    <b>Jenis Toko : </b> {{$data_toko['type']}}
</div>
@if (session('massage'))
    <div class="alert alert-primary">{{session('massage')}}</div>
@endif
<div class="card">
    <div class="card-header">
        Daftar Produk
    </div>
    <div class="card-body">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama produk</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Deskripsi produk</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_produk as $item)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$item->nama_produk}}</td>
                        <td>{{$item->harga}}</td>
                        <td>{{$item->deskripsi_produk}}</td>
                        <td>
                            <button type="button" class="btn btn-success">Hapus</button>
                            <button type="button" class="btn btn-danger">Edit</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@extends('layouts.master')

@section('konten')
<h1>Selamat Datang Di produk</h1>
<hr>
<button type="button" class="btn btn-primary mb-4">Tambah Data</button>
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
                    <th scope="col">Stok</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>coki coki</td>
                    <td>100</td>
                    <td>5000</td>
                    <td>
                        <button type="button" class="btn btn-success">Hapus</button>
                        <button type="button" class="btn btn-danger">Edit</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
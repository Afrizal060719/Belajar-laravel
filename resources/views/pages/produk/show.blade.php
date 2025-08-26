@extends('layouts.master')

@section('konten')
    <h1>Daftar produk kami</h1>
    <hr>
    <a href="/product/create" type="button" class="btn btn-primary mb-3">Tambah data</a>
    <div class="alert alert-primary">
        <b>Nama toko :</b> {{$data_toko['nama_toko']}}
        <br>
        <b>Alamat :</b> {{$data_toko['alamat']}}
        <br>
        <b>Tipe toko :</b> {{$data_toko['type']}}
    </div> 
       @if(session('message'))
        <div class="alert alert-primary">{{session('message')}}</div>
        @endif
        <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
    <span>Daftar produk</span>
    <div class="d-flex gap-2">
        @if (Request()->keyword != '')
            <a href="/product" class="btn btn-info">Reset</a>
        @endif
        <form class="input-group" style="width: 350px">
            <input type="text" class="form-control" name="keyword" placeholder="Cari data produk">
            <button class="btn btn-success" type="submit" id="button-addon2">Cari data</button>
        </form>
    </div>
</div>

        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                 @forelse ($data_produk as $item)
                      <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$item->nama_produk}}</td>
                        <td>{{$item->harga}}</td>
                        <td>{{$item->deskripsi_produk}}</td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger me-1" data-bs-toggle="modal" data-bs-target="#hapus{{$item->id_produk}}">
                                Hapus
                            </button>

                            <a href="/product/{{$item->id_produk}}/edit" class="btn btn-success me-1">
                                Edit
                            </a>

                            <a href="/product/{{$item->id_produk}}" class="btn btn-info">
                                Detail
                            </a>
                        </td>
                    </tr>
                 @empty
                        <tr>
                            <td colspan="5" class="text-center">Data produk belum tersedia</td>
                        </tr>
                 @endforelse
                   
                </tbody>
            </table>
        </div>
    </div>

    
    @foreach($data_produk as $item)
        <!-- Modal -->
        <div class="modal fade" id="hapus{{$item->id_produk}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/product/{{$item->id_produk}}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi !!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus produk {{$item->id_produk}} ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

    @endforeach
@endsection
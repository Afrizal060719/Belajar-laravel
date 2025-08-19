<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;    
use App\Models\produk;

class ProdukController extends Controller
{
    public function index(){
        $toko = [
            'nama_toko'=>'Sukamaju',
            'alamat'=>'Sidoarjo',
            'type'=>'Kelontong'
        ];
        $produk = produk::get(); //query untuk mengambil data di tb produk
        //$queryBulider = DB::table('tb_produk')->get(); //query untuk mengambil semua data yang ada di tb_produk
        return view('pages.produk.show',[
            'data_toko'=>$toko,
            'data_produk'=>$produk,
        ]);
    }

    public function create(){
        return view('pages.produk.add');
    }

    public function store(Request $request){

        //validasi
        $request->validate([
            'nama_produk'=>'required',
            'harga_produk'=>'required',
            'deskripsi'=>'required',
        ]);

        // untuk menambah data ke database
        //DB::table('tb_produk')->create([]);

        //query tambah data
       produk::create([
            'nama_produk'=>$request->nama_produk,
            'harga'=>$request->harga_produk,       
            'deskripsi_produk'=>$request->deskripsi,
            'kategori_id'=>'1'
       ]);

       // setelah tambah data berhasil
       return redirect('/product')->with('massage','berhasil menambahkan data');

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    public function index(Request $request){
        $toko = [
            'nama_toko'=>'Sukamaju',
            'alamat'=> 'Sidoarjo',
            'type' => 'Warnet'
        ];

        $search = $request->keyword;

       $produk = produk::when($search,function($query,$search){
            return $query->where('nama_produk','like',"%{$search}%");
            
       })->get(); 
       
       //query untuk menampilkan semua data yang berada di tb_produk
    //  $queryBuilder = DB::table('tb_produk')->get();// query untuk mengambil semua data yang berada di tb_produk

        return view('pages.produk.show',[
            'data_toko'=>$toko,
            'data_produk'=>$produk,
        ]);
    }

    public function create(){
        return view('pages.produk.add');
    }

    public function store(Request $request){
        $request->validate([
            'nama_produk'=>'required|min:4|max:20',
            'harga_produk'=>'required',
            'deskripsi'=>'required',
        ],[
            'nama_produk.required'=>'inputan nama produk harus diisi',
           'harga_produk.required'=>'inputan harga produk harus diisi',
           'deskripsi.required'=>'inputan deskripsi produk harus diisi',
        ]);
            //untak menambahkan data ke dalam tabel produk\
            //DB::table('tb_produk')->create([]);
            //query tambah data
        produk::create([
            'nama_produk'=>$request->nama_produk,
            'harga'=>$request->harga_produk,
            'deskripsi_produk'=>$request->deskripsi,
            'kategori_id'=>'1'
        ]);
        
        //setelah data berhasil ditambahk akan mengarahhkan ke halaman /product dan memberikan notif berasil menambahkan data
        return redirect('/product')->with('message','berhasil menambahkan data');
        
    }

    public function show($id){
        //query atau perintah
        //elequent or
        $data = produk::findOrFail($id);
        
        // DB::table('tb_produk')->where('id_produk',$id)->firstOrFail();
        
        return view('pages.produk.detail',[
            'produk'=>$data
        ]);
            
    }

    public function edit($id){
        //mengambil data berdasarkan id yang dikirmkan bedasarkan parameter
        $data = produk::findOrFail($id);

        return view('pages.produk.edit',[
            'data'=>$data,
        ]);
    }

    public function update($id,Request $request){
        //validasi
        $request->validate([
            'nama_produk'=>'required|min:3|max:20',
            'harga_produk'=>'required',
            'deskripsi'=>'required',
        ],[
            'nama_produk.required'=>'inputan nama produk harus diisi',
           'harga_produk.required'=>'inputan harga produk harus diisi',
           'deskripsi.required'=>'inputan deskripsi produk harus diisi',
        ]);

        //query untuk simpan data yang kita update
        produk::where ('id_produk',$id)->update([
            'nama_produk'=>$request->nama_produk,
            'harga'=>$request->harga_produk,
            'deskripsi_produk'=>$request->deskripsi,
        ]);

        return redirect ('/product')->with('message','berhasil diupdate');
    }

    public function destroy($id){
        //query untuk menghapus data berdasarkan id
        produk::findOrFail($id)->delete();

        return redirect('/product')->with('message','berhasil dihapus');
    }
}

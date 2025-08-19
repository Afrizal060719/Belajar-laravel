<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tb_produk')->insert([
            [
                'nama_produk'=>'Avanza',
                'harga'=>90000000,
                'deskripsi_produk'=>'ini adalah sebuah mobil',
                'kategori_id'=>'2',
                'created_at'=>now()
            ],[
                'nama_produk'=>'Beat',
                'harga'=>200000,
                'deskripsi_produk'=>'ini adalah sebuah sepeda motor',
                'kategori_id'=>'2',
                'created_at'=>now()
            ],[
                'nama_produk'=>'Jeep',
                'harga'=>80000000,
                'deskripsi_produk'=>'ini adalah sebuah mobil',
                'kategori_id'=>'2',
                'created_at'=>now()
            ]
        ]);
    }
}

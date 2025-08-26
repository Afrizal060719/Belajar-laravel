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
        //query untuk menambah
        DB::table('tb_produk')->insert([
            'nama_produk'   => 'Smart tv polygon 50 inch',
            'harga'         => '15000000',
            'deskripsi_produk' => 'ini adalah smart tv polygon 50 inch',
            'kategori_id'   => '2',
            'created_at'    => now()
        ],[
            'nama_produk'   => 'Laptop asus tuff',
            'harga'         => '65000000',
            'deskripsi_produk' => 'ini adalah laptop asus tuff',
            'kategori_id'   => '2',
            'created_at'    => now()
        ],[
            'nama_produk'   => 'Ip 7 promax ultra',
            'harga'         => '95000000',
            'deskripsi_produk' => 'ini adalah ip 7 promax ultra',
            'kategori_id'   => '2',
            'created_at'    => now()
        ]);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    // inisialiasi tabel produk
    protected $table = 'tb_produk';

    // inisialiasi primary key di dalam tabel
    protected $primaryKey = 'id_produk';

    // inisialiasi data yang dapat kita isi
    //protected $fillable = ['nama_produk', 'harga', 'stok'];

    // inisialiasi data yang tidak boleh kita isi
    protected $guarded = ['id_produk'];
}

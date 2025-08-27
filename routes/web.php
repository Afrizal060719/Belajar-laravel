<?php

use App\Http\Controllers\ProdukController;

Route::get('/', function () {
    return view('pages.beranda');
});

Route::get('/about', function(){
    return view('pages.about',[
        'nama'=>'Afrizal Dani',
        'umur'=>18,
        'alamat' =>'jatim',

    ]);
});


Route::view('/contact', 'pages.contact');

//satu controller
Route::get('/product', [ProdukController::class,'index']);//read data menampilkan data

Route::get('/product/create', [ProdukController::class,'create']); //menampilkan halaman form data 
Route::post('/product', [ProdukController::class,'store']); //untuk mengelola data yang dikirm dari form data
Route::get('/product/{id}', [ProdukController::class,'show']); //menampilkan detail data berdasarkan id

Route::get('/product/{id}/edit', [ProdukController::class,'edit']); //menampilkan halaman form edit data
Route::put('/product/{id}', [ProdukController::class,'update']); //mengupdate data berdasarkan id

Route::delete('/product/{id}', [ProdukController::class,'destroy']); //menghapus data berdasarkan id
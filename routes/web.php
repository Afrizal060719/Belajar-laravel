<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.beranda');
});

Route::get('/about', function () {
    $biodata = [
        'nama'=>'Afrizal Dani',
        'umur'=>18,
        'alamat'=>'Indonesia',
    ];
    return view('pages.about', $biodata);
});

Route::get('/about/{id}', function($id) {
    return view('pages.detail',[
        'nomer'=>$id
    ]);
});

Route::view('/contact', 'pages.contact');

Route::view('/product', 'pages.product');

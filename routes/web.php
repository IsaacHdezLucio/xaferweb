<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
    // return view('welcome');
});

Route::get('/productos', function () {
    return view('productos');
});

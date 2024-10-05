<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});
Route::get('/Product', function () {
    return view('Product');
});
Route::get('/addProduct', function () {
    return view('addProduct');
});
Route::get('/bahanbaku', function () {
    return view('bahanbaku');
});



<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});
Route::get('/Inventory', function () {
    return view('inventory');
});
Route::get('/bahanbaku', function () {
    return view('bahanbaku');
});



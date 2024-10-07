<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MaterialController;

// Route ke halaman dashboard
Route::get('/', function () {
    return view('dashboard');
});

// Route untuk produk, menggunakan ProductController
Route::get('/Product', [ProductController::class, 'index'])->name('products.index');
Route::get('/addProduct', [ProductController::class, 'create'])->name('products.create');

// Route untuk bahan baku, menggunakan MaterialController
Route::get('/Materials', [MaterialController::class, 'index'])->name('materials.index');
Route::get('/Materials/create', [MaterialController::class, 'create'])->name('materials.create');
Route::post('/Materials', [MaterialController::class, 'store'])->name('materials.store');
Route::get('/Materials/{id}/edit', [MaterialController::class, 'edit'])->name('materials.edit');
Route::put('/Materials/{id}', [MaterialController::class, 'update'])->name('materials.update');
Route::delete('/Materials/{id}', [MaterialController::class, 'destroy'])->name('materials.destroy');



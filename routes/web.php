<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MaterialController;

// Route ke halaman dashboard
Route::get('/', function () {
    return view('dashboard');
});

// Route untuk produk, menggunakan ProductController
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show'); // Jika Anda ingin menampilkan detail produk
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

// Route untuk bahan baku, menggunakan MaterialController
Route::get('/Materials', [MaterialController::class, 'index'])->name('materials.index');
Route::get('/Materials/create', [MaterialController::class, 'create'])->name('materials.create');
Route::post('/Materials', [MaterialController::class, 'store'])->name('materials.store');
Route::get('/Materials/{id}/edit', [MaterialController::class, 'edit'])->name('materials.edit');
Route::put('/Materials/{id}', [MaterialController::class, 'update'])->name('materials.update');
Route::delete('/Materials/{id}', [MaterialController::class, 'destroy'])->name('materials.destroy');



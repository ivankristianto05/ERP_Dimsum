<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\BoMController; // Pastikan untuk mengimpor BoMController

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
Route::get('/materials', [MaterialController::class, 'index'])->name('materials.index');
Route::get('/materials/create', [MaterialController::class, 'create'])->name('materials.create');
Route::post('/materials', [MaterialController::class, 'store'])->name('materials.store');
Route::get('/materials/{material}/edit', [MaterialController::class, 'edit'])->name('materials.edit');
Route::put('/materials/{material}', [MaterialController::class, 'update'])->name('materials.update');
Route::delete('/materials/{material}', [MaterialController::class, 'destroy'])->name('materials.destroy');

// Route untuk BoM, menggunakan BoMController
Route::get('/bom', [BoMController::class, 'index'])->name('bom.index');
Route::get('/bom/create', [BoMController::class, 'create'])->name('bom.create'); // Form untuk menambah BoM
Route::post('/bom', [BoMController::class, 'store'])->name('bom'); // Simpan BoM baru
Route::get('/bom/{bom}/edit', [BoMController::class, 'edit'])->name('bom.edit'); // Form untuk edit BoM
Route::put('/bom/{bom}', [BoMController::class, 'update'])->name('bom.update'); // Perbarui BoM
Route::delete('/bom/{bom}', [BoMController::class, 'destroy'])->name('bom.destroy'); // Hapus BoM


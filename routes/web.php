<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\BoMController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\RFQController;
use App\Http\Controllers\CustomerController;

// Route ke halaman dashboard
Route::get('/', function () {
    return view('dashboard');
});

// Route untuk produk, menggunakan ProductController
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
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
Route::get('/bom/create', [BoMController::class, 'create'])->name('bom.create');
Route::post('/bom', [BoMController::class, 'store'])->name('bom.store');
Route::get('/bom/{bom}/edit', [BoMController::class, 'edit'])->name('bom.edit');
Route::put('/bom/{bom}', [BoMController::class, 'update'])->name('bom.update');
Route::delete('/bom/{bom}', [BoMController::class, 'destroy'])->name('bom.destroy');
Route::get('/bom/report', [BoMController::class, 'report'])->name('bom.report');

// Route untuk manufacturing
Route::get('/manufacturing', function () {
    return view('manufacturing.index');
})->name('manufacturing.index');
Route::get('/manufacturing/create', function () {
    return view('manufacturing.create');
})->name('manufacturing.create');

// Route untuk vendor, menggunakan resource controller
Route::resource('vendor', VendorController::class)->except(['show']);


// Route untuk RFQ
Route::get('/rfq', [RFQController::class, 'index'])->name('rfq.index');
Route::get('/rfq/create', [RFQController::class, 'create'])->name('rfq.create');
Route::post('/rfq', [RFQController::class, 'store'])->name('rfq.store');
Route::get('/rfq/{id}', [RFQController::class, 'show'])->name('rfq.show');
Route::post('/rfq/send/{id}', [RFQController::class, 'send'])->name('rfq.send');
Route::put('/rfq/{id}/status', [RFQController::class, 'updateStatus'])->name('rfq.updateStatus');

// Route untuk customers

Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
Route::put('/customers/{id}', [CustomerController::class, 'update'])->name('customers.update');

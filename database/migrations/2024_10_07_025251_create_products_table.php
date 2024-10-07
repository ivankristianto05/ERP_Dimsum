<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // ID produk
            $table->string('nama'); // Nama produk
            $table->string('kategori'); // Kategori produk
            $table->string('codeprodak')->unique(); // Kode produk (otomatis)
            $table->decimal('harga', 10, 2); // Harga produk
            $table->text('deskripsi'); // Deskripsi produk
            $table->string('foto')->nullable(); // Foto produk (optional)
            $table->timestamps(); // Timestamp untuk created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('boms', function (Blueprint $table) {
            $table->id();
            $table->string('bom_number'); // Kolom ID BOM
            $table->unsignedBigInteger('product_id'); // Kolom Produk
            $table->unsignedInteger('qty'); // Kolom Quantity
            $table->decimal('cost', 10, 2); // Kolom Cost (10 digits total, 2 decimal places)
            $table->timestamps();
            
            // Relasi ke tabel produk
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boms');
    }
};

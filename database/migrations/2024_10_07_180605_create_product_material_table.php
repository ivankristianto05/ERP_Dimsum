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
        Schema::create('product_material', function (Blueprint $table) {
            $table->id(); // Kolom ID
            $table->unsignedBigInteger('material_id'); // Kolom material_id
            $table->unsignedBigInteger('product_id'); // Kolom product_id
            $table->integer('jumlah'); // Kolom jumlah

            // Menambahkan foreign key dengan cascade on delete dan on update
            $table->foreign('material_id')->references('id')->on('materials')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_material');
    }
};

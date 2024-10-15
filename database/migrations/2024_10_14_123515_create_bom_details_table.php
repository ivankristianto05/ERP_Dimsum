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
        Schema::create('bom_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bom_id'); // Kolom BOM ID
            $table->unsignedBigInteger('material_id'); // Kolom Material
            $table->integer('qty'); // Kolom Quantity
            $table->string('satuan'); // Kolom Satuan
            $table->decimal('cost', 10, 2); // Kolom Cost
            $table->timestamps();

            // Relasi ke tabel BoM dan Materials
            $table->foreign('bom_id')->references('id')->on('boms')->onDelete('cascade');
            $table->foreign('material_id')->references('id')->on('materials')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bom_details');
    }
};

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
        Schema::create('bo_m_s', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('nama'); // Nama BoM
            $table->string('kode')->unique(); // Kode BoM yang unik
            $table->integer('qty'); // Quantity untuk BoM
            $table->decimal('cost', 10, 2); // Total cost untuk BoM
            $table->timestamps(); // Timestamps
        });

        // Menghubungkan BoM dengan tabel materials yang sudah ada
        Schema::table('materials', function (Blueprint $table) {
            $table->unsignedBigInteger('bo_m_id')->nullable(); // Foreign key untuk BoM

            // Foreign key constraint
            $table->foreign('bo_m_id')->references('id')->on('bo_m_s')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Hapus foreign key dan kolom bo_m_id dari tabel materials terlebih dahulu
        Schema::table('materials', function (Blueprint $table) {
            $table->dropForeign(['bo_m_id']);
            $table->dropColumn('bo_m_id');
        });

        // Hapus tabel bo_m_s
        Schema::dropIfExists('bo_m_s');
    }
};

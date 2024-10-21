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
        Schema::table('materials', function (Blueprint $table) {
            // Mengubah kolom harga dari decimal ke bigint
            $table->bigInteger('harga')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('materials', function (Blueprint $table) {
            // Mengembalikan kolom harga ke decimal
            $table->decimal('harga', 8, 2)->change(); // Sesuaikan presisi dan skala sesuai kebutuhan
        });
    }
};

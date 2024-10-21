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
        Schema::table('bom_details', function (Blueprint $table) {
            // Ubah kolom 'cost' dari decimal menjadi bigint
            $table->bigInteger('cost')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bom_details', function (Blueprint $table) {
            // Kembalikan tipe data 'cost' ke decimal jika diperlukan
            $table->decimal('cost', 15, 2)->change();
        });
    }
};

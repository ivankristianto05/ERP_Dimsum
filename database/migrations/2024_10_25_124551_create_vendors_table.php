<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('address');
            $table->string('email')->unique();
            $table->string('phone');
            $table->text('notes')->nullable();
            $table->string('image_path')->nullable(); // untuk menyimpan path gambar/logo
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vendors');
    }
}

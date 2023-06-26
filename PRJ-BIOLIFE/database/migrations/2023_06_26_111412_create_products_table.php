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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('idProduct');
            $table->string('nameProduct');
            $table->integer('priceProduct');
            $table->integer('priceSaleProduct')->nullable();
            $table->double('weightProduct');
            $table->date('mfgProduct');
            $table->date('expProduct');
            $table->string('originProduct');
            $table->string('descriptionProduct');
            $table->integer('viewProduct')->nullable();
            $table->integer('idCategory')->unsigned();
            $table->foreign('idCategory')->references('idCategory')->on('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

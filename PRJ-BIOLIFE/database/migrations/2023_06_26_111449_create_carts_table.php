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
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('idCart');
            $table->integer('quantityCart');
            $table->integer('idProduct')->unsigned();
            $table->foreign('idProduct')->references('idProduct')->on('products');
            $table->integer('idBill')->unsigned()->nullable();
            $table->foreign('idBill')->references('idBill')->on('bills');
            $table->integer('idUser')->unsigned()->nullable();
            $table->foreign('idUser')->references('idUser')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};

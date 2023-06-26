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
        Schema::create('bills', function (Blueprint $table) {
            $table->increments('idBill');
            $table->string('fullnameBill');
            $table->string('phoneBill');
            $table->string('emailBill')->nullable();
            $table->string('addressBill');
            $table->integer('paymentMethodBill');
            $table->date('dateBill');
            $table->integer('totalBill');
            $table->integer('statusBill');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};

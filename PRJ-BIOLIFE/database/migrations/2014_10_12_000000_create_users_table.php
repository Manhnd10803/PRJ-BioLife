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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('idUser');
            $table->string('usernameUser');
            $table->string('passwordUser');
            $table->string('fullnameUser');
            $table->string('phoneUser')->nullable();
            $table->string('addressUser')->nullable();
            $table->string('emailUser')->unique();
            $table->integer('roleUser');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

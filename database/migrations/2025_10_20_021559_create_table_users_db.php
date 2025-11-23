<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users_db', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('name', 100);
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role')->default('Pelanggan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('users_db');
    }
};

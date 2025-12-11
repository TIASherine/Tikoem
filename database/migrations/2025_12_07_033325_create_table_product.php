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
        Schema::create('product', function (Blueprint $table) {
            $table->increments('product_id');
            $table->string('name', 100);
            $table->decimal('price', 8,3);
            $table->enum('category', ['Minuman', 'Makanan', 'Snack', 'Lainnya']);
            $table->integer('stock')->unsigned()->default(0);
            $table->string('supplier', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
};
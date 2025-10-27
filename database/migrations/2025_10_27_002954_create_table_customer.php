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
        Schema::create('customer', function (Blueprint $table) {
            $table->increments('customer_id');
            $table->string('address_line', 100);
            $table->string('city', 100);
            $table->string('state', 100);
            $table->string('postal_code', 10);
            $table->string('country', 100);
            $table->enum('membership_type', ['Regular', 'Premium', 'VIP'])->nullable();
            $table->date('registration_date')->nullable();
            $table->date('last_purchase_date')->nullable();
            $table->decimal('total_spent');
            $table->enum('preferred_contact_method', ['Email', 'Phone', 'SMS'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};

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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedDecimal('total_price', 12 , 2);
            $table->boolean('payment_status')->default(false);
            $table->string('order_code', 12)->unique();
            $table->string('customer_name', 100);
            $table->string('customer_last_name', 100);
            $table->string('customer_email', 319);
            $table->string('customer_address', 255);
            $table->string('customer_phone', 15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

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
        Schema::create('category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category_name');
            $table->longText('description')->nullable();
            $table->timestamps();
        });

        Schema::create('product', function (Blueprint $table) {
            $table->increments ('id');
            $table->string('product_name');
            $table->longText('description')->nullable();
            $table->float('product_price', 6, 2);
            $table->string('image');
            $table->unsignedInteger('category_id')->nullable();                
            $table->timestamps();
        });

        Schema::create('payment', function (Blueprint $table) {
            $table->increments ('id');
            // $table->unsignedInteger('order_id');
            $table->string('transaction_id')->unique();
            $table->float('payment_amount', 6, 2);
            $table->timestamps();
        });

        Schema::create('order', function (Blueprint $table) {
            $table->increments ('id');
            $table->unsignedInteger('user_id')->nullable();   
            $table->string('order_status');
            $table->float('total_price', 6, 2);
            $table->unsignedInteger('payment_id')->nullable();
            $table->string('image');
            $table->timestamps();
        });

        Schema::create('order_item', function (Blueprint $table) {
            $table->increments ('id');
            $table->unsignedInteger('order_id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('quantity');
            $table->float('order_amount', 6, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category');
        Schema::dropIfExists('product');
        Schema::dropIfExists('payment');
        Schema::dropIfExists('order');
    }
};

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
        Schema::table('product', function (Blueprint $table) {
            $table->foreign('category_id')
                  ->references('id')
                  ->on('category')
                  ->onDelete('cascade');
        });
        Schema::table('order', function (Blueprint $table) {
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->foreign('payment_id')
                  ->references('id')
                  ->on('payment')
                  ->onDelete('cascade');
        });
        Schema::table('order_item', function (Blueprint $table) {
            $table->foreign('order_id')
                  ->references('id')
                  ->on('order') 
                  ->onDelete('cascade');

            $table->foreign('product_id')
                  ->references('id')
                  ->on('product')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
        });


        Schema::table('order', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['payment_id']);
        });

        Schema::table('order_item', function (Blueprint $table) {
            $table->dropForeign(['order_id']);
            $table->dropForeign(['product_id']);
        });
    }
};

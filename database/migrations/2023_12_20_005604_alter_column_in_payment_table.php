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
       
        // Schema::table('payment', function (Blueprint $table) {
        //     $table->dropForeign(['order_id']); // Drop foreign key constraint
        //     $table->dropColumn('order_id'); // Drop the order_id column
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('payment', function (Blueprint $table) {
        //     $table->unsignedInteger('order_id');
        //     $table->foreign('order_id')->references('id')->on('orders');
        // });
    }
};

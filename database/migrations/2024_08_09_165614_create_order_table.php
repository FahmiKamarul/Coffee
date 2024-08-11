<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('orderID'); 
            $table->foreignId('productID')->constrained('products', 'productID')->onDelete('cascade');
            $table->string('orderName');
            $table->string('orderStatus'); 
            $table->text('orderAddress'); 
            $table->float('orderPrice'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders'); // Fixed the table name here
    }
};

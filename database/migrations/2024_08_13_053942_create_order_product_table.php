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
        Schema::create('orderProducts', function (Blueprint $table) {
            $table->foreignId('orderID')->constrained('orders','orderID')->onDelete('cascade');
            $table->foreignId('productID')->constrained('products','productID')->onDelete('cascade');
            $table->integer('quantity');

            $table->primary(['orderID', 'productID']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderProduct');
    }
};

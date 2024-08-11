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
        Schema::create('products', function (Blueprint $table) {
            $table->id('productID'); 
            $table->timestamps();
            
            $table->string('productName');
            $table->string('productImage'); 
            $table->string('productCategory'); 
            $table->boolean('productDairyFree')->default(true); 
            $table->text('productDescription'); 
            $table->float('productPrice');
            $table->boolean('productActive')->default(true);
        });        
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

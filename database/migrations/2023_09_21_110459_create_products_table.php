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
            $table->bigIncrements('id');
            $table->string('name')->nullable(); 
            $table->text('description')->nullable(); 
            $table->unsignedInteger('category_id')->nullable();  
            $table->float('price', 9,2)->nullable();
            $table->text('image')->nullable();
            $table->string('barcode')->nullable();
            $table->string('sku')->nullable();
            $table->string('type')->nullable();
            $table->boolean('status')->nullable();
            $table->string('can_show')->nullable();
            $table->bigInteger('qty')->nullable();
            $table->timestamps();
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

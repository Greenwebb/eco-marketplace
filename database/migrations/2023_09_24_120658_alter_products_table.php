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
        Schema::table('products', function (Blueprint $table) {
            // Add new columns with their respective data types
            $table->decimal('vat', 8, 2)->nullable();
            $table->string('tax_class')->nullable();
            $table->string('disc_type')->nullable();
            $table->decimal('disc_value', 8, 2)->nullable();
            $table->decimal('fixed_price', 8, 2)->nullable();
            $table->string('avatar_remove')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->json('tags')->nullable();
            $table->integer('shelf_qty')->nullable();
            $table->integer('warehouse_qty')->nullable();
            $table->boolean('allow_backorder')->default(false);
            $table->decimal('weight', 8, 2)->nullable();
            $table->decimal('width', 8, 2)->nullable();
            $table->decimal('height', 8, 2)->nullable();
            $table->decimal('length', 8, 2)->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            
            // Add foreign key constraint for user_id if needed
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

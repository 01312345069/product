<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->string('product_id')->unique(); // Unique product ID
            $table->string('name'); // Product name
            $table->text('description')->nullable(); // Optional description
            $table->decimal('price', 8, 2); // Product price with 2 decimal places
            $table->integer('stock')->nullable(); // Optional stock quantity
            $table->string('image')->nullable(); // Optional image URL
            $table->timestamps(); // Created_at and updated_at timestamps
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

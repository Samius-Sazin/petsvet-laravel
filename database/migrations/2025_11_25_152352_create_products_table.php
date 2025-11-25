<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            // Basic product info
            $table->string('title');
            $table->text('details')->nullable();
            $table->string('category')->nullable();
            $table->string('sku')->unique()->nullable(); // optional unique SKU
            $table->decimal('price', 10, 2); // store price in decimal
            $table->decimal('offer', 5, 2)->default(0); // discount percentage
            $table->integer('quantity')->default(0); // stock quantity
            $table->integer('sold')->default(0); // number sold

            // Ratings & Reviews
            $table->decimal('rating', 2, 1)->default(0); // average rating (0-5)
            $table->json('reviews')->nullable(); // array of review objects

            // Images
            $table->json('images')->nullable(); // array of image paths

            // Extra product features
            $table->json('tags')->nullable(); // product tags
            $table->boolean('is_active')->default(true); // active/inactive product
            $table->boolean('is_featured')->default(false); // featured product flag
            $table->json('attributes')->nullable(); // size, color, weight, etc.
            
            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
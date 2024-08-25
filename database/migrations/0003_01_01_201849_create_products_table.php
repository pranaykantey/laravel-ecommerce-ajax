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
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->longText('description');
            $table->string('image')->nullable();
            $table->longText('short_description')->nullable();
            $table->string('regular_price')->nullable();
            $table->string('sale_price')->nullable();
            $table->string('images')->nullable();
            $table->string('SKU')->nullable();
            $table->string('quantity')->nullable();
            $table->string('stock_status')->nullable();
            $table->string('featured')->nullable();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreignId('brand_id')->nullable()->references('id')->on('brands')->cascadeOnDelete();
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

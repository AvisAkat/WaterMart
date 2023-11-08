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
        Schema::create('saleItems', function (Blueprint $table) {
            $table->uuid('id')->primary();
            // $table->unsignedBigInteger('sale_id');
            // $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            $table->double('price');
            $table->timestamps();

            $table->foreignUuid('sale_id')->references('id')->on('sales')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignUuid('product_id')->references('id')->on('products')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saleItems');
    }
};

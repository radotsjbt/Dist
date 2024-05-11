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
        Schema::create('products_radot', function (Blueprint $table) {
            $table->id();
            $table->string('farmer_id');
            $table->string('farmer_name');
            $table->string('farmer_phone');
            $table->string('farmer_email');
            $table->string('land_area');
            $table->string('harv_id');
            $table->string('harv_name');
            $table->string('harv_desc');
            $table->string('harv_type');
            $table->string('harv_stock');
            $table->string('harv_price');
            $table->string('image_harv');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_radot');
    }
};

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
        Schema::create('offerings_radot', function (Blueprint $table) {
            $table->id();
            $table->string('distributor_id');
            $table->string('farmer_id');
            $table->integer('qty');
            $table->string('product_name');
            $table->string('total_price');
            $table->string('status');
            $table->text('notes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offerings_radot');
    }
};

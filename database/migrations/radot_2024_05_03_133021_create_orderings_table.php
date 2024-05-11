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
        Schema::create('orderings', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->string('distributor_id');
            $table->string('farmer_id');
            $table->integer('qty');
            $table->integer('price');
            $table->integer('total_price');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderings');
    }
};

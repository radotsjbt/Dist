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
        Schema::create('distributors_radot', function (Blueprint $table) {
            $table->id();
            $table->string('cust_id')->nullable();
            $table->string('cust_name');
            $table->string('cust_address');
            $table->string('cust_phone')->nullable();
            $table->string('cust_email')->nullable();
            $table->string('fax')->nullable();
            $table->text('website')->nullable();
            $table->string('company_image')->nullable();
            $table->string('purchase_needs');
            $table->string('qty_pr_needs');
            $table->string('price');
            $table->string('buy_price');
            $table->string('custprod_name');
            $table->string('custprod_desc')->nullable();
            $table->string('custprod_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('distributors_radot');
    }
};

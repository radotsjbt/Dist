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
        Schema::create('harvests', function (Blueprint $table) {
            $table->id();
            $table->string('Harv_ID'); 
            $table->foreignId('Farmer_Id');   
            $table->string('Farmer_Name');      
            $table->string('Harv_Name');
            $table->string('Harv_Desc');
            $table->string('Harv_Type');
            $table->integer('Harv_Stock');
            $table->integer('Harv_Price');
            $table->string('Image_Harv');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('harvests');
    }
};

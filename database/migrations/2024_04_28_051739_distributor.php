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
        Schema::create('distributors', function (Blueprint $table) {
            $table->id();
            $table->string('Dist_ID'); //from regist process (User Model)
            $table->string('Dist_Name'); //from regist form (username)
            $table->text('Dist_Address');
            $table->string('Dist_Phone'); //from regist form (phone)
            $table->string('Dist_Email'); //from regist form (email)
            $table->string('Purchase_Needs')->default('default')->nullable();
            $table->integer('Qty')->nullable();
            $table->string('Purchase_Price')->default('default')->nullable();
            $table->string('DistProd_Name')->default('default')->nullable();
            $table->text('DistProd_Desc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('distributors');
    }
};

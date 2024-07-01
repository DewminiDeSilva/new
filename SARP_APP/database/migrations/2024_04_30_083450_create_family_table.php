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
        Schema::create('families', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('beneficiary_id'); // This is the foreign key
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('gender');
            $table->string('dob');
            $table->string('youth');
            $table->string('education');
            $table->string('employment');
            $table->string('nutrition_level');
            $table->timestamps();

            $table->foreign('beneficiary_id')->references('id')->on('beneficiaries')->onDelete('cascade');

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family');
    }
};

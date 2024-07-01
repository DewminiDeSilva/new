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
        Schema::create('beneficiaries', function (Blueprint $table) {
            $table->id();
            $table->string("nic")-> unique;
            
            $table->string('first_name');
            $table->string('last_name');
            $table->string("gender");
            $table->string("dob");
            $table->string("address");
            $table->string("phone");
            $table->string("income");
            $table->string("family_members_count");
            $table->string("education");
            $table->string("land_ownership");
            $table->string("age");
            // $table->string("province");
            // $table->string("district");
            // $table->string("ds_division");
            $table->string("province_name");
            $table->string("district_name");
            $table->string("ds_division_name");
            $table->string("gn_division_name");
            $table->string("as_center");
            $table->string("tank_name");
            $table->string("acc_number");
            $table->string("acc_name");
            $table->string("latitude");
            $table->string("longitude");



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficiary');
    }
};

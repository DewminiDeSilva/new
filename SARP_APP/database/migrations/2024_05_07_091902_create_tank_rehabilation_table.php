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
        Schema::create('tank_rehabilation', function (Blueprint $table) {
            $table->id()-> unique;
            $table->string('tank_id');
            $table->string('tank_name');
            $table->string('river_basin');
            $table->string('cascade_name');
            $table->string('province');
            $table->string('district');
            $table->string('ds_division');
            $table->string('gn_division');
            $table->string('as_centre');
            $table->string('agency');
            $table->string('no_of_family');
            $table->string('longitude');
            $table->string('latitude');
            $table->string('progress');
            $table->string('contractor');
            $table->string('payment');
            $table->string('eot');
            $table->string('contract_period');
            $table->string('status');
            $table->string('remarks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tank_rehabilation');
    }
};

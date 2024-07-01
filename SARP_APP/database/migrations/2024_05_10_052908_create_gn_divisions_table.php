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
        Schema::create('gn_divisions', function (Blueprint $table) {
            $table->id();
            $table->string('gn_division');
            $table->unsignedBigInteger('d_s_division_id');
            $table->foreign('d_s_division_id')->references('id')->on('d_s_division_id')->onDelete('cascade');
            
        });

        // Insert provided data
        DB::table('gn_divisions')->insert([
            
            ['gn_division' => 'Medawachchiya', 'd_s_division_id' => 1], 
            ['gn_division' => 'Kebithigollewa', 'd_s_division_id' => 1], 
            ['gn_division' => 'Thalawa', 'd_s_division_id' => 1], 
            ['gn_division' => 'Horowpathana', 'd_s_division_id' => 1], 
            ['gn_division' => 'Nochchiyagama', 'd_s_division_id' => 1], 
            ['gn_division' => 'Rambewa', 'd_s_division_id' => 2], 
            ['gn_division' => 'Thirappane', 'd_s_division_id' => 3], 
            ['gn_division' => 'Galenbidunuwewa', 'd_s_division_id' => 4], 
            ['gn_division' => 'Palugaswewa', 'd_s_division_id' => 5], 
            ['gn_division' => 'Mihintale', 'd_s_division_id' => 6], 
            ['gn_division' => 'Mahavilachchiya', 'd_s_division_id' => 7], 
            ['gn_division' => 'Na.Nu.Pa', 'd_s_division_id' => 8]
    ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gn_divisions');
    }
};

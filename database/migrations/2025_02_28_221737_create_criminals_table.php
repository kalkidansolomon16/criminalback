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
        Schema::create('criminals', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->date('date_of_birth');
            $table->string('mother_name');
            $table->foreignId('sex_id')->references('id')->on('regions')->onDelete('cascade');
            $table->string('birth_place');
            $table->foreignId('region_id_1')->references('id')->on('regions')->onDelete('cascade');
            $table->foreignId('town_id_1')->references('id')->on('towns')->onDelete('cascade');
            $table->foreignId('city_id_1')->references('id')->on('cities')->onDelete('cascade');
            $table->foreignId('region_id_2')->references('id')->on('regions')->onDelete('cascade');
            $table->foreignId('town_id_2')->references('id')->on('towns')->onDelete('cascade');
            $table->foreignId('educational_level_id')->references('id')->on('educational_levels')->onDelete('cascade');
            $table->string('job');
            $table->string('state');
            $table->foreignId('religion_id')->references('id')->on('religions')->onDelete('cascade');
            $table->string('photo');
            $table->string('Closest_respondent');
            $table->foreignId('region_id_3')->references('id')->on('regions')->onDelete('cascade');
            $table->foreignId('town_id_3')->references('id')->on('towns')->onDelete('cascade');
            $table->foreignId('city_id_3')->references('id')->on('cities')->onDelete('cascade');
            $table->string('Closest_respondent_district');
            $table->string('phone');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('crime_description');
            $table->foreignId('criminal_type_id')->references('id')->on('criminal_types')->onDelete('cascade');
            $table->foreignId('crime_id')->references('id')->on('crimes')->onDelete('cascade');
            $table->date('date_enterd');
            $table->string('arrest_court');
            $table->date('verdict_date');
            $table->date('appointment_date');
            $table->string('prisoner');
            $table->string('updated_verdict');
            $table->string('verdict_court');
            $table->date('start_dateof_arrest');
            $table->date('end_dateof_arrest');
            $table->date('date_of_release');
            $table->string('release_reason');
            $table->date('dateof_mercy_release');
            $table->json('writ')->nullable();
            $table->tinyInteger('status');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('criminals');
    }
};

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
        Schema::create('prision_cells', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('prisioners', function (Blueprint $table) {
            $table->id();
            $table->string('prisioner_unique_number');
            $table->string('prision_unique_number');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->date('date_of_birth');
            $table->string('mother_name');
            $table->integer('sex');
            $table->string('birth_district');
            $table->foreignId('birth_town_id')->references('id')->on('towns')->onDelete('cascade');
            $table->foreignId('ethnic_group_id')->references('id')->on('ethnic_groups')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('prision_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prisioner_id')->references('id')->on('prisioners')->onDelete('cascade');
            $table->string('photo');
            $table->foreignId('prision_cell_id')->references('id')->on('prision_cells')->onDelete('cascade');
            $table->foreignId('criminal_type_id')->references('id')->on('criminal_types')->onDelete('cascade');
            $table->foreignId('current_city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreignId('educational_level_id')->references('id')->on('educational_levels')->onDelete('cascade');
            $table->foreignId('religion_id')->references('id')->on('religions')->onDelete('cascade');
            $table->string('closest_respondent');
            $table->foreignId('closest_respondent_town_id')->references('id')->on('towns')->onDelete('cascade');
            $table->string('current_district');
            $table->string('closest_respondent_district');
            $table->string('job');
            $table->string('phone_number');
            $table->string('mobile_number');
            $table->dateTime('date_time_entered');
            $table->string('end_date_of_arrest');
            $table->string('date_of_release');
            $table->string('release_reason')->nullable();
            $table->dateTime('date_of_mercy_release')->nullable();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('prisioner_appearances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prision_history_id')->references('id')->on('prision_histories')->onDelete('cascade');
            $table->foreignId('hair_type_id')->references('id')->on('hair_types')->onDelete('cascade');
            $table->float('height');
            $table->string('face');
            $table->string('forehead');
            $table->string('nose');
            $table->string('eye_color');
            $table->string('teeth');
            $table->string('lip');
            $table->string('ear');
            $table->string('unique_appearance');
            $table->string('citizenship');
            $table->timestamps();
        });

        Schema::create('prisioner_properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prision_history_id')->references('id')->on('prision_histories')->onDelete('cascade');
            $table->foreignId('type_id')->references('id')->on('types')->onDelete('cascade'); // cash, phone
            $table->integer('amount');
            $table->string('description');
            $table->dateTime('date_received')->nullable();
            $table->dateTime('date_returned')->nullable();
            $table->timestamps();
        });

        Schema::create('prisioners_cashes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prision_history_id')->references('id')->on('prision_histories')->onDelete('cascade');
            $table->dateTime('date');
            $table->integer('amount');
            $table->integer('type')->nullable(); // 1 -> deposit 2 -> withdraw
            $table->timestamps();

        });

        Schema::create('prisioner_crimes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prision_history_id')->references('id')->on('prision_histories')->onDelete('cascade');
            $table->foreignId('crime_id')->references('id')->on('crimes')->onDelete('cascade');
            
            $table->longText('crime_description');
            $table->integer('status'); // 1 -> accused, 2 -> found guilty
            $table->timestamps();

        });

        Schema::create('prisioner_court_stories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prision_history_id')->references('id')->on('prision_histories')->onDelete('cascade');
            $table->foreignId('court_id')->references('id')->on('courts')->onDelete('cascade');
            $table->foreignId('updated_verdict_court')->references('id')->on('courts')->onDelete('cascade')->nullable();
            $table->string('appointment_date');
            $table->date('verdict_date')->nullable();
            $table->string('verdict_description');
            $table->string('updated_verdict')->nullable();
            $table->integer('status'); // 1 -> pending, 2 -> final verdict
            $table->integer('criminal_status'); // 1 -> not criminal, 2 -> criminal
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prision_cells');
        Schema::dropIfExists('prisioners');
        Schema::dropIfExists('prision_histories');
        Schema::dropIfExists('prisioner_crimes');
        Schema::dropIfExists('prisioner_court_stories');
    }
};

<?php

use App\Settings\Constants;
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
            $table->string('photo')->nullable();
            $table->foreignId('prision_cell_id')->nullable()->references('id')->on('prision_cells')->onDelete('cascade')->nullable();
            $table->foreignId('criminal_type_id')->nullable()->references('id')->on('criminal_types')->onDelete('cascade')->nullable();
            $table->foreignId('current_city_id')->nullable()->references('id')->on('cities')->onDelete('cascade')->nullable();
            $table->foreignId('educational_level_id')->nullable()->references('id')->on('educational_levels')->onDelete('cascade')->nullable();
            $table->foreignId('religion_id')->nullable()->references('id')->on('religions')->onDelete('cascade')->nullable();
            $table->string('closest_respondent')->nullable();
            $table->foreignId('closest_respondent_town_id')->nullable()->references('id')->on('towns')->onDelete('cascade')->nullable();
            $table->string('current_district')->nullable();
            $table->string('closest_respondent_district')->nullable();
            $table->string('job')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('mobile_number')->nullable();
            $table->dateTime('date_time_entered')->nullable();
            $table->string('end_date_of_arrest')->nullable();
            $table->string('date_of_release')->nullable();
            $table->string('release_reason')->nullable();
            $table->dateTime('date_of_mercy_release')->nullable();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('prisoner_apperances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prision_history_id')->references('id')->on('prision_histories')->onDelete('cascade');
            $table->foreignId('hair_type_id')->references('id')->on('hair_types')->onDelete('cascade');
            $table->foreignId('nose_id')->references('id')->on('noses')->onDelete('cascade');
            $table->foreignId('eye_id')->references('id')->on('eyes')->onDelete('cascade');
            $table->foreignId('teeth_id')->references('id')->on('teeths')->onDelete('cascade');
            $table->foreignId('lip_id')->references('id')->on('lips')->onDelete('cascade');
            $table->foreignId('ear_id')->references('id')->on('ears')->onDelete('cascade');
            $table->float('height');
            $table->string('face');
            $table->string('forehead');
            $table->string('unique_appearance');
            $table->string('extra_description');
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
            $table->integer('status')->default(Constants::ACCUSED); // 1 -> accused, 2 -> found guilty
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
        Schema::dropIfExists('prisoner_apperances');
        Schema::dropIfExists('prision_histories');
        Schema::dropIfExists('prisioner_crimes');
        Schema::dropIfExists('prisioner_court_stories');
        Schema::dropIfExists('prisioners');
    }
};

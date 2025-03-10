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
        Schema::create('criminal_informations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('criminal_id')->references('id')->on('criminals')->onDelete('cascade');
            $table->float('height');
            $table->foreignId('hair_type_id')->references('id')->on('hair_types')->onDelete('cascade');
            $table->string('face');
            $table->string('forehead');
            $table->string('nose');
            $table->string('Eye_color');
            $table->string('teeth');
            $table->string('lip');
            $table->string('ear');
            $table->string('Unique_appearance');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('criminal_informations');
        
    }
};

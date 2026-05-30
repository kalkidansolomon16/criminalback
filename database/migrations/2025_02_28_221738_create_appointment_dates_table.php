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
        Schema::create('appointment_dates', function (Blueprint $table) {
            $table->id();
            $table->string('court_name');
            $table->date('date');
            $table->json('file');
            $table->unsignedBigInteger('criminal_id');
            $table->foreignId('prision_history_id')->references('id')->on('prision_histories')->onDelete('cascade');
       
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointment_dates');
    }
};

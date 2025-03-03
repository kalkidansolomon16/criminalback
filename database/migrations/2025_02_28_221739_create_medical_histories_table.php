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
        Schema::create('medical_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('hospital_name');
            $table->string('doctor_name');
            $table->unsignedBigInteger('criminal_id');
            $table->unsignedBigInteger('disease_type');
            $table->date('date');
            $table->string('doctor_address');
            $table->float('medical_expense');
            $table->json('guards');
            $table->foreign('criminal_id')->references('id')->on('criminals')->onDelete('cascade');
            $table->foreign('disease_type')->references('id')->on('disease_types')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_histories');
    }
};

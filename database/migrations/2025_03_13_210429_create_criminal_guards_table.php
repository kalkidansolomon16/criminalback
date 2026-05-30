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
        Schema::create('criminal_guards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guard_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('prision_history_id')->references('id')->on('prision_histories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('criminal_guards');
    }
};

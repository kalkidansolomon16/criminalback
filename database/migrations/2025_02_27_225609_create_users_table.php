<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); 
            $table->string('full_name'); 
            // $table->string('sex');
            $table->foreignId('sex_id')->constrained()->onDelete('cascade');
            $table->integer('age'); 
            $table->string('password'); 
            $table->string('user_name')->unique(); 
            $table->string('address'); 
            $table->string('phone_number');
            // $table->string('criminal_id'); 
            $table->foreignId('role_id')->constrained()->onDelete('cascade');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
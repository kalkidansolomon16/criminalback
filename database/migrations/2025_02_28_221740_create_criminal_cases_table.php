<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('criminal_cashes', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('criminal_id')->references('id')->on('criminals')->onDelete('cascade');
            $table->integer('amount'); 
            $table->date('deposit_date')->nullable(); 
            $table->date('withdrawal_date')->nullable(); 
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade'); 
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('criminal_cashes');
    }
};
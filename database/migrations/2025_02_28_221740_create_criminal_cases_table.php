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
            $table->foreignId('criminal_id')->constrained()->onDelete('cascade');
            $table->integer('amount'); 
            $table->date('deposit_date'); 
            $table->date('withdrawal_date'); 
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('criminal_cashes');
    }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();          // Primary key for session ID
            $table->text('payload');                   // Column for session data (serialized)
            $table->integer('last_activity')->unsigned(); // Last activity timestamp
            $table->string('user_id')->nullable();     // Optional user ID associated with the session
            $table->string('ip_address')->nullable();  // Optional IP address of the user
            $table->string('user_agent')->nullable();  // Optional user agent string
            $table->timestamps();                       // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sessions');
    }
}
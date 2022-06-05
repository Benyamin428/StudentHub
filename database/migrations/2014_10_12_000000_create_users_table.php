<?php

use Illuminate\Support\Facades\Schema; /** Schema is a library imported */
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() /** Function that creates the table */
    {
        Schema::create('users', function (Blueprint $table) { /** This command allows you to create a table using Eloquent */
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique(); /** Adds a unique index to the email column */
            $table->string('password');
            $table->rememberToken(); /** Adds remember token as VARCHAR(100) NULL */
            $table->timestamps(); /** Adds created_at and updated_at columns */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() /** Function to delete the table */
    {
        Schema::dropIfExists('users');
    }
}

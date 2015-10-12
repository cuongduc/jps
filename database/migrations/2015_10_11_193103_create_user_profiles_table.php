<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('address')->nullable();
            $table->string('district', 50)->nullable();
            $table->string('city', 30)->nullable();
            $table->string('telephone', 25)->nullable();
            $table->string('avatar')->nullable();
            $table->integer('user_id');

            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_profiles');
    }
}

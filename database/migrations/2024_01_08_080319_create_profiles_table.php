<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('first_name');
            $table->string('second_name');
            $table->string('logo')->nullable();
            $table->text('bio')->nullable();
            $table->string('gender')->nullable();
            $table->date('birth')->nullable();
            $table->timestamps();

            $table->index('user_id', 'user_profile_idx');
            $table->foreign('user_id', 'user_profile_fk')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
};

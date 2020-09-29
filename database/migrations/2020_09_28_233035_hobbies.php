<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Hobbies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hobbies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("hobbie");
            $table->string("description");
            $table->integer("hours");
            $table->timestamps();

            $table->foreignId('user_id')->constrained('my_user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hobbies');
    }
}

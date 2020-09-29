<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MyUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("name");
            $table->string("lastname");
            $table->integer("age");
            $table->string("email");
            $table->string("password");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('my_user');
    }
}

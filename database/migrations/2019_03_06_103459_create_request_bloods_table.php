<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestBloodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_bloods', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('calendar_id')->unsigned()->nullable();
            $table->foreign('calendar_id')->references('id')->on('calendars')->onDelete('cascade');
            $table->integer('blood_group_id')->unsigned()->nullable();
            $table->foreign('blood_group_id')->references('id')->on('blood_groups')->onDelete('cascade');
            $table->string('content')->nullable();
            $table->boolean('status');
            $table->string('type');
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
        Schema::dropIfExists('request_bloods');
    }
}

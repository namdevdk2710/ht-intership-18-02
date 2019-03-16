<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBloodBagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_bags', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('request_blood_id')->unsigned();
            $table->foreign('request_blood_id')->references('id')->on('request_bloods')->onDelete('cascade');
            $table->integer('wareHouse_id')->unsigned()->nullable();
            $table->foreign('wareHouse_id')->references('id')->on('ware_houses')->onDelete('cascade');
            $table->integer('unit');
            $table->boolean('status');
            $table->boolean('hbsag');
            $table->boolean('antihiv');
            $table->boolean('antihcv');
            $table->boolean('hbvnat');
            $table->boolean('hivnat');
            $table->boolean('hcvnat');
            $table->boolean('syphilis');
            $table->boolean('malaria');
            $table->string('note')->nullable();
            $table->string('other')->nullable();
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
        Schema::dropIfExists('blood_bags');
    }
}

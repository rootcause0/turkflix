<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEpisodesTable extends Migration
{
    public function up()
    {
        Schema::create('episodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('episode_number');
            $table->text('episode_description');
            $table->integer('seen')->default(0);
            $table->bigInteger('season_id')->unsigned();
            $table->foreign('season_id')->references('id')->on('seasons');
            $table->timestamps();
        });
    }

    public function down() {}
}

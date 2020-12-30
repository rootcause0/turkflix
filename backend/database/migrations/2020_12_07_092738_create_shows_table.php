<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shows', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('imdb_id');
            $table->string('show_title');
            $table->string("original_title");
            $table->string("slug");
            $table->string("poster");
            $table->string("back_poster");
            $table->string("youtube_key");
            $table->string("release");
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
        Schema::dropIfExists('shows');
    }
}

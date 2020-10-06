<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostMultimediaItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_multimedia_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_post')->unsigned();
            $table->binary('value');
            $table->timestamps();

            $table->foreign('id_post')->references('id')->on('posts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_multimedia_items');
    }
}

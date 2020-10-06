<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_pages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_pages')->unsigned();
            $table->string('judul');
            $table->string('keterangan');
            $table->binary('multimedia');
            $table->timestamps();

            $table->foreign('id_pages')->references('id')->on('menu_pages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_pages');
    }
}

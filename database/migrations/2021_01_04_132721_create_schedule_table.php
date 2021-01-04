<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_pemilik')->unsigned();
            $table->string('title');
            $table->date('start');
            $table->date('end');
            $table->string('gambar')->nullable();
            $table->text('deskripsi')->nullable();
            $table->boolean('allDay');
            $table->timestamps();

            $table->foreign('id_pemilik')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedule');
    }
}

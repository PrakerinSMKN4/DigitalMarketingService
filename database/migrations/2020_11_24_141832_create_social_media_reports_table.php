<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialMediaReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_media_reports', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_post')->unsigned();
            $table->date('tanggal');
            $table->integer('jumlah_like');
            $table->integer('jumlah_komentar');
            $table->integer('jumlah_pengunjung_pria');
            $table->integer('jumlah_pengunjung_wanita');
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
        Schema::dropIfExists('social_media_reports');
    }
}

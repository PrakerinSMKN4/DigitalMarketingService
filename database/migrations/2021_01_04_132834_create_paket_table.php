<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paket', function (Blueprint $table) {
            $table->id();
            $table->string('paket');
            $table->dateTime('durasi');
            $table->enum('status',['active','inactive']);
            $table->integer('harga');
            $table->string('tema');
            $table->enum('status_pembayaran', ['pending','selesai'])->nullable();
            $table->enum('jenis_pembayaran',['atm','paypal','offline']);
            $table->bigInteger('id_user')->unsigned();
            $table->text('deskripsi');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paket');
    }
}

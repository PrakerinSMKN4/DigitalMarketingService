<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_pemilik')->unsigned()->index();
            $table->string('nama_company');
            $table->text('alamat');
            $table->string('description');
            $table->string('vision');
            $table->string('mission');
            $table->string('slogan');
            $table->string('logo');
            $table->string('email')->unique();
            $table->string('instagram')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('contact_center')->nullable();
            $table->string('nomor_rekening')->nullable();
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
        Schema::dropIfExists('companies');
    }
}

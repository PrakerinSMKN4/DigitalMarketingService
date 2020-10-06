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
            $table->string('email')->unique();
            $table->string('contact_center');
            $table->string('nomor_rekening');
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialMediaAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_media_accounts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_company')->unsigned();
            $table->string('username')->unique();
            $table->string('password');
            $table->enum('social_media',['Instagram','Facebook']);
            $table->enum('kategori_akun',['Makanan','Clean','Corporate','Fashion','Non Profit','Residence','Fun']);
            $table->string('website');
            $table->timestamps();

            $table->foreign('id_company')->references('id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('social_media_accounts');
    }
}

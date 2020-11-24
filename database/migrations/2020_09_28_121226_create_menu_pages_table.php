<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_pages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_company')->unsigned();
            $table->string('keterangan');
            $table->string('deskripsi')->nullable();
            $table->enum('jenis_halaman',['profile','products','services','about']);
            $table->string('multimedia')->nullable();
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
        Schema::dropIfExists('menu_pages');
    }
}

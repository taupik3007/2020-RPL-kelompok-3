<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAkumulasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akumulasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_calon');
            $table->unsignedBigInteger('id_kategori');
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_calon')->references('id')->on('calon');
            $table->foreign('id_kategori')->references('id')->on('kategori');

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
        Schema::dropIfExists('akumulasi');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calon', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_calon');

            $table->unsignedBigInteger('id_kategori');
            $table->unsignedBigInteger('id_wakil');
            $table->foreign('id_wakil')->references('id')->on('users');

            $table->text('visi');
            $table->text('misi');
            $table->integer('status');
            $table->timestamps();

            $table->foreign('id_calon')->references('id')->on('users');
            $table->foreign('id_kategori')->references('id')->on('kategori');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calon');
    }
}

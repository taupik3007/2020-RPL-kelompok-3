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
            $table->unsignedBigInteger('nis_wakil');
            $table->string('nama_wakil');
            $table->string('kategori');
            $table->string('kelas_wakil');
            $table->text('visi');
            $table->text('misi');
            $table->integer('status');
            $table->timestamps();
            $table->foreign('id_calon')->references('id')->on('users');
            $table->foreign('nis_wakil')->references('nis')->on('users');
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

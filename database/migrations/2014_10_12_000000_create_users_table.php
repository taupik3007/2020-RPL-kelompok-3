<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nis')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->unsignedBigInteger('id_kelas');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('level');
            $table->rememberToken();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
            $table->foreign('id_kelas')->references('id')->on('kelas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

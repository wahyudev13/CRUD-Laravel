<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pengguna extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('pengguna', function (Blueprint $table) {
        //     $table->increments('id_pengguna');
        //     $table->string('nim',100);
        //     $table->string('nama',255);
        //     $table->string('username',255);
        //     $table->string('password',255);
        //     $table->string('level',50);
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

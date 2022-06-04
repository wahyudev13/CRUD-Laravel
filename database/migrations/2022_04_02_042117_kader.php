<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Kader extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('kader', function (Blueprint $table) {
        //     $table->increments('id_kader');
        //     $table->string('nim',100);
        //     $table->string('nama',255);
        //     $table->integer('nomor');
        //     $table->string('alamat',255);
        //     $table->string('tempat',100);
        //     $table->date('tanggal');
        //     $table->integer('komisariat');
        //     $table->date('tahun');
        //     $table->string('jabatan',255);
        //     $table->integer('posisi');
        //     $table->string('putama',255);
        //     $table->string('pkhusus',255);
        //     $table->string('foto',255);
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

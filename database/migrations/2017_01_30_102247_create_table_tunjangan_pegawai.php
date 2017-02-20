<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTunjanganPegawai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tunjangan_pegawai', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kode_tunjangan_id')->unique()->unsigned();
            $table->foreign('kode_tunjangan_id')->references('id')->on('tunjangan')->OnDelete('CASCADE')->OnUpdate('CASCADE');
            $table->integer('pegawai_id')->unsigned();
            $table->foreign('pegawai_id')->references('id')->on('pegawai')->OnDelete('CASCADE')->OnUpdate('CASCADE');
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
        Schema::dropIfExists('tunjangan_pegawai');
    }
}

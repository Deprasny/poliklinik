<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResepTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resep', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal');
            $table->integer('dokter_id')->unsigned();
            $table->integer('pasien_id')->unsigned();
            $table->integer('poliklinik_id')->unsigned();
            $table->string('total_harga');
            $table->string('bayar');
            $table->string('kembali');
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
        Schema::dropIfExists('resep');
    }
}

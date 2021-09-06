<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id('id_barang');
            $table->bigInteger('id_penerimaan')->unsigned();
            $table->integer('jumlah');
            $table->string('satuan');
            $table->timestamps();
        });
        Schema::table('barang', function (Blueprint $table) {
            $table->foreign('id_penerimaan')->references('id_penerimaan')->on('penerimaan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang');
    }
}

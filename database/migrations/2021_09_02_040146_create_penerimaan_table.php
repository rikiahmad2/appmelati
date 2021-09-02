<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenerimaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penerimaan', function (Blueprint $table) {
            $table->id('id_penerimaan');
            $table->bigInteger('id_mustahik')->unsigned();
            $table->bigInteger('id_muzakki')->unsigned();
            $table->bigInteger('id_bank')->unsigned();
            $table->bigInteger('id_user')->unsigned();
            $table->enum('jenis', ['zakat fitrah','zakat mal','infak','sedekah','fidyah','wakaf']);
            $table->enum('cara_pembayaran', ['cash','transfer']);
            $table->enum('bentuk_pembayaran', ['uang','beras','barang donasi']);
            $table->integer('jumlah_pembayaran');
            $table->timestamps();
        });

        Schema::table('penerimaan', function (Blueprint $table) {
            $table->foreign('id_mustahik')->references('id')->on('mustahik')->onDelete('cascade');
            $table->foreign('id_muzakki')->references('id')->on('muzakki')->onDelete('cascade');
            $table->foreign('id_bank')->references('id_bank')->on('bank')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penerimaan');
    }
}

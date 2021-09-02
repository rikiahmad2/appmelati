<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenyaluranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyaluran', function (Blueprint $table) {
            $table->id('id_penyaluran');
            $table->bigInteger('id_penerimaan')->unsigned();
            $table->timestamps();
        });
        Schema::table('penyaluran', function (Blueprint $table) {
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
        Schema::dropIfExists('penyaluran');
    }
}

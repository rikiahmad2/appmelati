<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMustahik extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mustahik', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('kriteria', ['fakir','miskin','mualaf','riqab','gharimin','sabilillah','musafir']);
            $table->string('no_kk');
            $table->string('nik')->unique();
            $table->string('alamat');
            $table->string('notelp');
            $table->string('kerja_suami');
            $table->string('kerja_istri');
            $table->string('jumlah_jiwa');
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
        Schema::dropIfExists('table_mustahik');
    }
}

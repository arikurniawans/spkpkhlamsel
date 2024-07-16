<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlternatifTable extends Migration
{
    public function up()
    {
        Schema::create('alternatif', function (Blueprint $table) {
            Schema::create('alternatif', function (Blueprint $table) {
                $table->increments('id_alternatif');
                $table->unsignedInteger('id_penduduk');
                $table->unsignedInteger('id_kriteria');
                $table->timestamps();
    
                // Define foreign key constraints
                $table->foreign('id_penduduk')->references('id')->on('penduduk');
                $table->foreign('id_kriteria')->references('id_kriteria')->on('kriteria');
            });
        });
    }

    public function down()
    {
        Schema::dropIfExists('alternatif');
    }
}

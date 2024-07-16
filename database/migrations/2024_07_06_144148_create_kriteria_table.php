<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kriteria', function (Blueprint $table) {
            $table->increments('id_kriteria'); // PK INT Auto Increment
            $table->string('nama_kriteria'); // Varchar
            $table->enum('tipe_kriteria', ['cost', 'benefit']); // Enum cost, benefit
            $table->string('sub_kriteria')->nullable(); // Varchar
            $table->integer('bobot'); // INT (anda dapat menyesuaikan jika perlu)
            $table->timestamps(); // Tambahkan created_at dan updated_at secara otomatis
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kriteria');
    }
}

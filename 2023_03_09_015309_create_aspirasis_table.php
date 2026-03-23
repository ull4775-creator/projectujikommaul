<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAspirasisTable extends Migration
{
    public function up()
    {
        Schema::create('aspirasis', function (Blueprint $table) {
            $table->id('id_aspirasi');

            // Foreign key ke tabel inputs.id
            $table->unsignedBigInteger('id_pelaporan');
            $table->foreign('id_pelaporan')
                  ->references('id')
                  ->on('inputs')
                  ->onDelete('restrict')
                  ->onUpdate('cascade');

            $table->string('aspirasi', 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('aspirasis');
    }
}

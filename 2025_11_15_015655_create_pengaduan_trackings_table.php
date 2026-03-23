<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengaduanTrackingsTable extends Migration
{
    public function up()
    {
        Schema::create('pengaduan_trackings', function (Blueprint $table) {
            $table->id();
            $table->string('kode_unik')->unique(); // Kode unik untuk tracking
            $table->unsignedBigInteger('pengaduan_id'); // Relasi ke tabel pengaduan
            $table->enum('status', ['baru', 'proses', 'selesai'])->default('baru');
            $table->timestamps();

            $table->foreign('pengaduan_id')->references('id')->on('pengaduans')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengaduan_trackings');
    }
}
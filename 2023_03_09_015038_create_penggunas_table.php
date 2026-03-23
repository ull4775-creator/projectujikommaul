<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenggunasTable extends Migration
{
    public function up()
    {
        Schema::create('penggunas', function (Blueprint $table) {
    $table->id('id_pengguna');
    $table->string('nik', 50)->unique();
    $table->string('username', 50)->unique(); // 🔹 tambah kolom username
    $table->string('nama');
    $table->string('alamat');
    $table->string('no_hp', 20)->nullable();
    $table->string('email')->nullable();
    $table->enum('role', ['admin', 'pengguna'])->default('pengguna'); // 🔹 tambah kolom role
    $table->timestamps();
});
    }

    public function down()
    {
        Schema::dropIfExists('penggunas');
    }
}

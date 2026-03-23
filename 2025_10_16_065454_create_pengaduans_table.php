<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id();

            $table->string('no_sa', 20);
            $table->text('alamat_lengkap');
            $table->string('nama')->nullable();              // ✅ baru
            $table->string('no_hp', 20)->nullable();

            $table->unsignedBigInteger('id_kategori')->nullable();

            $table->string('email')->nullable();
            $table->string('share_lokasi')->nullable();
            
            $table->text('ket')->nullable();
            $table->string('foto')->nullable();
            $table->string('kode')->nullable();

            $table->enum('status', ['Menunggu','Proses','Selesai'])
                  ->default('menunggu');

            $table->enum('tingkat_masalah', ['kecil','sedang','besar'])
                  ->nullable();

            $table->enum('lokasi_daerah_cabang', [
                'cabang1',
                'cabang2',
                'cabang3',
                'cabang4',
                'pusat_bhayangkara'
            ])->nullable();

            $table->timestamps();

            $table->foreign('id_kategori')
                  ->references('id_kategori')
                  ->on('kategoris')
                  ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengaduans');
    }
};

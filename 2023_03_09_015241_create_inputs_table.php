<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inputs', function (Blueprint $table) {
            $table->id(); // Primary key otomatis
            $table->string('no_sa', 11); // NIK Pelapor
            $table->string('alamat', 255); // Alamat lengkap pelapor
            $table->unsignedBigInteger('id_kategori')->nullable(); // Relasi ke tabel kategori
            $table->string('lokasi', 255)->nullable(); // Lokasi kejadian
            $table->string('foto')->nullable(); // Nama file foto
            $table->text('ket')->nullable(); // Keterangan pengaduan
            $table->string('kode')->unique(); // Kode pelaporan unik
            $table->enum('status', ['Dikirim', 'Diproses', 'Selesai'])->default('Dikirim'); // Status laporan
            $table->timestamps();

            // Foreign key (opsional, jika tabel kategoris ada)
            $table->foreign('id_kategori')
                  ->references('id_kategori')
                  ->on('kategoris')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inputs');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chat_pengaduans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengaduan_id')
                  ->constrained('pengaduans')
                  ->cascadeOnDelete();
            $table->enum('pengirim', ['admin','user']);
            $table->text('pesan');
            $table->boolean('dibaca')->default(false); // 'admin' atau 'user'
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chat_pengaduans');
    }
};

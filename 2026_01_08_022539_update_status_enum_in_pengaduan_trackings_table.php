<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Ubah enum status, tambahkan 'menunggu'
        DB::statement("ALTER TABLE pengaduan_trackings MODIFY COLUMN status ENUM('baru','proses','selesai','menunggu') NOT NULL DEFAULT 'baru'");
    }

    public function down(): void
    {
        // Kembalikan ke enum semula (tanpa 'menunggu')
        DB::statement("ALTER TABLE pengaduan_trackings MODIFY COLUMN status ENUM('baru','proses','selesai') NOT NULL DEFAULT 'baru'");
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('pengaduan_trackings', function (Blueprint $table) {
            if (!Schema::hasColumn('pengaduan_trackings', 'petugas_id')) {
                $table->unsignedBigInteger('petugas_id')->nullable()->after('status');
                $table->foreign('petugas_id')->references('id_pengguna')->on('penggunas')->onDelete('set null');
            }
        });
    }

    public function down(): void
    {
        Schema::table('pengaduan_trackings', function (Blueprint $table) {
            $table->dropForeign(['petugas_id']);
            $table->dropColumn('petugas_id');
        });
    }
};




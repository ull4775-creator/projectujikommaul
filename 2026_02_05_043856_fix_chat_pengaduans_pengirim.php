<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('chat_pengaduans', function (Blueprint $table) {
        $table->dropColumn('pengirim');
    });

    Schema::table('chat_pengaduans', function (Blueprint $table) {
        $table->enum('pengirim', ['admin','user'])->after('pengaduan_id');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

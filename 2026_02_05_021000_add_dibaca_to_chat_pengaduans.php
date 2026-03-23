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
        $table->boolean('dibaca')->default(false)->after('pesan');
    });
}

public function down()
{
    Schema::table('chat_pengaduans', function (Blueprint $table) {
        $table->dropColumn('dibaca');
    });
}

};

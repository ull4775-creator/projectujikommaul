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
    Schema::table('pengaduans', function (Blueprint $table) {
        if (!Schema::hasColumn('pengaduans', 'no_sa')) {
            $table->string('no_sa')->nullable();
        }
        if (!Schema::hasColumn('pengaduans', 'alamat_lengkap')) {
            $table->string('alamat_lengkap')->nullable();
        }
        if (!Schema::hasColumn('pengaduans', 'email')) {
            $table->string('email')->nullable();
        }
        if (!Schema::hasColumn('pengaduans', 'keterangan')) {
            $table->text('keterangan')->nullable();
        }
        if (!Schema::hasColumn('pengaduans', 'lokasi_cabang')) {
            $table->string('lokasi_cabang')->nullable();
        }
        if (!Schema::hasColumn('pengaduans', 'foto')) {
            $table->string('foto')->nullable();
        }
    });
}

public function down()
{
    Schema::table('pengaduans', function (Blueprint $table) {
        $table->dropColumn([
            'no_sa',
            'alamat_lengkap',
            'email',
            'keterangan',
            'lokasi_cabang',
            'foto'
        ]);
    });
}

};

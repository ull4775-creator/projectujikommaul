<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::table('pengaduans', function (Blueprint $table) {

            if (!Schema::hasColumn('pengaduans', 'status')) {
                $table->string('status')->default('Menunggu');
            }

        });
    }

    public function down(): void
    {
        Schema::table('pengaduans', function (Blueprint $table) {

            if (Schema::hasColumn('pengaduans', 'status')) {
                $table->dropColumn('status');
            }

        });
    }
};

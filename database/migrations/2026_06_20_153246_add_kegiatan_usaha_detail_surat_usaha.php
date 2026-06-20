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
        Schema::table('detail_surat_usahas', function (Blueprint $table) {
            $table->string('kegiatan_usaha')->nullable()->after('modal_usaha');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detail_surat_usahas', function (Blueprint $table) {
            $table->dropColumn('kegiatan_usaha');
        });
    }
};

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
        Schema::table('surats', function (Blueprint $table) {
            $table->string('keterangan')->nullable()->after('jenis_surat');
            $table->string('jumlah_orang')->nullable()->after('keterangan');
            $table->string('alamat_baru')->nullable()->after('jumlah_orang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('surats', function (Blueprint $table) {
            $table->dropColumn('keterangan');
            $table->dropColumn('jumlah_orang');
            $table->dropColumn('alamat_baru');
        });
    }
};

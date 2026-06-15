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
        Schema::create('detail_surat_usahas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surat_id')->constrained('surats')->onDelete('cascade');
            $table->string('nama_perusahaan');
            $table->string('tempat_usaha');
            $table->string('npwp_perusahaan');
            $table->string('sarana_usaha')->nullable();
            $table->decimal('modal_usaha', 15, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_surat_usahas');
    }
};

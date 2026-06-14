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
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_penduduk');
            $table->string('no_surat');
            $table->tinyInteger('jenis_surat')->comment('1=Surat Pengantar KTP, 2=Surat Pengantar KK, 3=Surat Domisili, 4=Surat SKTM, 5=Surat Pindah, 6=Surat Usaha');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_penduduk')->references('id')->on('penduduks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};

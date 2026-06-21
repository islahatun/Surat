<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Surat extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id_penduduk',
        'no_surat',
        'jenis_surat',
        'keterangan',
        'jumlah_orang',
        'alamat_baru',
        'status_approval',
    ];

    public function penduduk(): BelongsTo
    {
        return $this->belongsTo(Penduduk::class, 'id_penduduk');
    }
    public function detailUsaha()
    {
        return $this->hasOne(DetailSuratUsaha::class, 'surat_id');
    }
    protected static function booted(): void
    {
        static::deleting(function (Surat $surat) {
            $surat->detailSuratUsaha()->delete();
        });
    }
}

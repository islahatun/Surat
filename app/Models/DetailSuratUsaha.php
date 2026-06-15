<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailSuratUsaha extends Model
{
    protected $table = 'detail_surat_usahas';

    protected $fillable = [
        'surat_id',
        'nama_perusahaan',
        'tempat_usaha',
        'npwp_perusahaan',
        'sarana_usaha',
        'modal_usaha',
    ];

    public function surat()
    {
        return $this->belongsTo(Surat::class, 'surat_id');
    }
}

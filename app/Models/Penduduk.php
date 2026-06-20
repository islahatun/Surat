<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penduduk extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nama',
        'nik',
        'no_kk',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'jenis_kelamin',
        'agama',
        'status_perkawinan',
        'jumlah_anak',
        'gol_darah',
        'pekerjaan',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_lahir' => 'date',
            'nik' => 'string',
            'no_kk' => 'string',
        ];
    }
}

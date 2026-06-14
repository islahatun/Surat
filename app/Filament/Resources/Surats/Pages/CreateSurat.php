<?php

namespace App\Filament\Resources\Surats\Pages;

use App\Filament\Resources\Surats\SuratResource;
use App\Models\Penduduk;
use Filament\Resources\Pages\CreateRecord;

class CreateSurat extends CreateRecord
{
    protected static string $resource = SuratResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        if (request()->has('id_penduduk')) {
            $penduduk = Penduduk::find(request('id_penduduk'));
            if ($penduduk) {
                $data['no_kk'] = $penduduk->no_kk;
                $data['tempat_lahir'] = $penduduk->tempat_lahir;
                $data['tanggal_lahir'] = $penduduk->tanggal_lahir;
                $data['jenis_kelamin'] = $penduduk->jenis_kelamin;
                $data['alamat'] = $penduduk->alamat;
                $data['agama'] = $penduduk->agama;
                $data['status_perkawinan'] = $penduduk->status_perkawinan;
                $data['jumlah_anak'] = $penduduk->jumlah_anak;
                $data['gol_darah'] = $penduduk->gol_darah;
            }
        }

        return $data;
    }
}

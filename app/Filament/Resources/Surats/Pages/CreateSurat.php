<?php

namespace App\Filament\Resources\Surats\Pages;

use App\Filament\Resources\Surats\SuratResource;
use App\Models\Penduduk;
use App\Models\DetailSuratUsaha;
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
                $data['keterangan'] = $penduduk->keterangan;
                $data['jumlah_orang'] = $penduduk->jumlah_orang;
                $data['alamat_baru'] = $penduduk->alamat_baru;
            }
        }

        return $data;
    }
    protected function afterCreate(): void
    {
        $data = $this->form->getState();
    
        if (($data['jenis_surat'] ?? null) == 6) {
            DetailSuratUsaha::create([
                'surat_id' => $this->record->id,
                'nama_perusahaan' => $data['nama_perusahaan'] ?? null,
                'npwp_perusahaan' => $data['npwp_perusahaan'] ?? null,
                'kegiatan_usaha' => $data['kegiatan_usaha'] ?? null,
                'sarana_usaha' => $data['sarana_usaha'] ?? null,
                'tempat_usaha' => $data['tempat_usaha'] ?? null,
                'modal_usaha' => $data['modal_usaha'] ?? null,
            ]);
        }
    }
}

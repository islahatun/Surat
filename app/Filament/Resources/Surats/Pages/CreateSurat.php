<?php

namespace App\Filament\Resources\Surats\Pages;

use App\Filament\Resources\Surats\SuratResource;
use App\Models\Penduduk;
use App\Models\DetailSuratUsaha;
use Filament\Resources\Pages\CreateRecord;

class CreateSurat extends CreateRecord
{
    protected static string $resource = SuratResource::class;
    protected static bool $canCreateAnother = false;

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
        // Mengambil semua data form mentah tanpa disaring oleh skema database model utama
        $rawData = $this->getMountedActionForm()?->getRawState() ?? request()->all();
        
        // Atau jika struktur di atas tidak terbaca di versi Filament Anda, gunakan ini:
        // $rawData = request()->input('mountedActionsData.0') ?? request()->all();

        // Hapus dd() ini jika data sudah berhasil muncul sesuai ekspektasi
        // dd($rawData);

        if (($rawData['jenis_surat'] ?? null) == 6) {
            DetailSuratUsaha::create([
                'surat_id' => $this->record->id,
                'nama_perusahaan' => $rawData['nama_perusahaan'] ?? null,
                'npwp_perusahaan' => $rawData['npwp_perusahaan'] ?? null,
                'kegiatan_usaha' => $rawData['kegiatan_usaha'] ?? null,
                'sarana_usaha'  => $rawData['sarana_usaha'] ?? null,
                'tempat_usaha'  => $rawData['tempat_usaha'] ?? null,
                'modal_usaha'   => $rawData['modal_usaha'] ?? null,
            ]);
        }
    }
}

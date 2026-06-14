<?php

namespace App\Filament\Resources\Surats\Pages;

use App\Filament\Resources\Surats\SuratResource;
use App\Models\Penduduk;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditSurat extends EditRecord
{
    protected static string $resource = SuratResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        if (isset($data['id_penduduk'])) {
            $penduduk = Penduduk::find($data['id_penduduk']);
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

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\Penduduks\Schemas;

use Filament\Infolists\Components\TextEntry as PendudukInfoItem;
use Filament\Schemas\Schema;

class PendudukInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                PendudukInfoItem::make('nama')->label('Nama'),
                
                // Gunakan formatStateUsing untuk memaksa cast ke string
                PendudukInfoItem::make('nik')
                    ->label('NIK')
                    ->formatStateUsing(fn ($state) => sprintf('%.0f', $state)),
                    
                PendudukInfoItem::make('no_kk')
                    ->label('No. KK')
                    ->formatStateUsing(fn ($state) => sprintf('%.0f', $state)),
                    
                PendudukInfoItem::make('tempat_lahir')->label('Tempat Lahir'),
                PendudukInfoItem::make('tanggal_lahir')->label('Tanggal Lahir'),
                PendudukInfoItem::make('alamat')->label('Alamat'),
                PendudukInfoItem::make('jenis_kelamin')->label('Jenis Kelamin'),
                PendudukInfoItem::make('agama')->label('Agama'),
                PendudukInfoItem::make('status_perkawinan')->label('Status Perkawinan'),
                PendudukInfoItem::make('jumlah_anak')->label('Jumlah Anak'),
                PendudukInfoItem::make('gol_darah')->label('Golongan Darah'),
            ]);
    }
}
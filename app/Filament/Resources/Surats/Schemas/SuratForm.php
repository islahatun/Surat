<?php

namespace App\Filament\Resources\Surats\Schemas;

use App\Models\Penduduk;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Set;

class SuratForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('no_surat')
                    ->label('No. Surat')
                    ->required(),

                Select::make('jenis_surat')
                    ->label('Jenis Surat')
                    ->options([
                        1 => 'Surat Pengantar KTP',
                        2 => 'Surat Pengantar KK',
                        3 => 'Surat Domisili',
                        4 => 'Surat SKTM',
                        5 => 'Surat Pindah',
                        6 => 'Surat Usaha',
                    ])
                    ->required(),

                Select::make('id_penduduk')
                    ->label('Pilih Penduduk (NIK)')
                    ->options(Penduduk::pluck('nik', 'id'))
                    ->searchable()
                    ->required()
                    ->live()
                    ->afterStateUpdated(function ($state, callable $set) {
                        if ($state) {
                            $penduduk = Penduduk::find($state);
                            if ($penduduk) {
                                $set('nama', $penduduk->nama);
                                $set('tempat_lahir', $penduduk->tempat_lahir);
                                $set('tanggal_lahir', $penduduk->tanggal_lahir);
                                $set('jenis_kelamin', $penduduk->jenis_kelamin);
                                $set('agama', $penduduk->agama);
                                $set('status_perkawinan', $penduduk->status_perkawinan);
                                $set('pekerjaan', $penduduk->pekerjaan);
                                $set('alamat', $penduduk->alamat);
                            }
                        }
                    }),
                    textInput::make('nama')->label('Nama')->disabled(),
                    textInput::make('tempat_lahir')->label('Tempat Lahir')->disabled(),
                    DatePicker::make('tanggal_lahir')->label('Tanggal Lahir')->disabled(),
                    textInput::make('jenis_kelamin')->label('Jenis Kelamin')->disabled(),
                    textInput::make('agama')->label('Agama')->disabled(),
                    textInput::make('status_perkawinan')->label('Status Perkawinan')->disabled(),
                    textInput::make('pekerjaan')->label('Pekerjaan')->disabled(),
                    textInput::make('alamat')->label('Alamat')->disabled(),
                    
            ]);
    }
}
<?php

namespace App\Filament\Resources\Penduduks\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput as PendudukTextInput;
use Filament\Forms\Components\DatePicker as PendudukDatePicker;
use Filament\Forms\Components\Select as PendudukSelect;
use Filament\Forms\Components\NumberInput as PendudukNumberInput;

class PendudukForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                PendudukTextInput::make('no_kk')->label('No. KK')->numeric()->maxLength(16),
                PendudukTextInput::make('nik')->label('NIK')->numeric()->maxLength(16)->unique(),
                PendudukTextInput::make('nama')->label('Nama'),
                PendudukTextInput::make('tempat_lahir')->label('Tempat Lahir'),
                PendudukDatePicker::make('tanggal_lahir')->label('Tanggal Lahir'),
                PendudukTextInput::make('alamat')->label('Alamat'),
                PendudukSelect::make('jenis_kelamin')
                    ->label('Jenis Kelamin')
                    ->options([
                        'L' => 'Laki-laki',
                        'P' => 'Perempuan',
                    ]),
                PendudukSelect::make('agama')->label('Agama')->options([
                    'Islam' => 'Islam',
                    'Kristen' => 'Kristen',
                    'Katolik' => 'Katolik',
                    'Hindu' => 'Hindu',
                    'Buddha' => 'Buddha',
                    'Konghucu' => 'Konghucu',
                ]),
                PendudukSelect::make('status_perkawinan')
                    ->label('Status Perkawinan')
                    ->options([
                        'BK' => 'Belum Kawin',
                        'K' => 'Kawin',
                        'CH' => 'Cerai Hidup',
                        'CM' => 'Cerai Mati',
                    ]),
                PendudukTextInput::make('jumlah_anak')->label('Jumlah Anak')->numeric(),
                PendudukSelect::make('gol_darah')
                    ->label('Golongan Darah')
                    ->options([
                        'A' => 'A',
                        'B' => 'B',
                        'AB' => 'AB',
                        'O' => 'O',
                    ])
                    ->nullable(),
                PendudukTextInput::make('pekerjaan')->label('Pekerjaan')->nullable(),
            ]);
    }
}

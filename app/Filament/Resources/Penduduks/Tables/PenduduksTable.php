<?php

namespace App\Filament\Resources\Penduduks\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Columns\TextColumn as PendudukTextColumn;
use Filament\Tables\Table;

class PenduduksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                PendudukTextColumn::make('nik')->label('NIK')->searchable()->sortable(),
                PendudukTextColumn::make('nama')->label('Nama')->searchable()->sortable(),
                PendudukTextColumn::make('no_kk')->label('No. KK')->searchable()->sortable(),
                PendudukTextColumn::make('tempat_lahir')->label('Tempat Lahir')->searchable()->sortable(),
                PendudukTextColumn::make('tanggal_lahir')->label('Tanggal Lahir')->searchable()->sortable(),
                PendudukTextColumn::make('jenis_kelamin')->label('Jenis Kelamin')->searchable()->sortable(),
                PendudukTextColumn::make('agama')->label('Agama')->searchable()->sortable(),
                PendudukTextColumn::make('status_perkawinan')->label('Status Perkawinan')->searchable()->sortable(),
                PendudukTextColumn::make('pekerjaan')->label('Pekerjaan')->searchable()->sortable(),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}

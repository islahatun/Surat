<?php

namespace App\Filament\Resources\Surats\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class SuratsTable
{
    public static function configure(Table $table): Table
    {
        return $table
        ->defaultSort('id', 'desc')
            ->columns([
                TextColumn::make('no_surat')->label('No. Surat')->searchable()->sortable(),
                TextColumn::make('jenis_surat')
                    ->label('Jenis Surat')
                    ->searchable()
                    ->sortable()
                    ->formatStateUsing(fn ($state) => [
                        1 => 'Surat Pengantar KTP',
                        2 => 'Surat Pengantar KK',
                        3 => 'Surat Domisili',
                        4 => 'Surat SKTM',
                        5 => 'Surat Pindah',
                        6 => 'Surat Usaha',
                    ][$state] ?? '-'),
                TextColumn::make('penduduk.nama')->label('Nama Penduduk')->searchable()->sortable(),
        
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
            ])
            ->bulkActions([
            BulkActionGroup::make([
                DeleteBulkAction::make(),
            ])
            ->label('Delete'),
        ]);
    }
}

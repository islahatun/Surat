<?php

namespace App\Filament\Resources\ViewSurats\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Filament\Actions\Action;

class ViewSuratsTable
{
    public static function configure(Table $table): Table
    {
        return $table
        ->defaultSort('id', 'desc')
            ->columns([
                TextColumn::make('no_surat')
                    ->label('No. Surat')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('jenis_surat')
                    ->label('Jenis Surat')
                    ->formatStateUsing(fn ($state) => [
                        1 => 'Surat Pengantar KTP',
                        2 => 'Surat Pengantar KK',
                        3 => 'Surat Domisili',
                        4 => 'Surat SKTM',
                        5 => 'Surat Pindah',
                        6 => 'Surat Usaha',
                    ][$state] ?? '-'),

                TextColumn::make('penduduk.nama')
                    ->label('Nama Penduduk')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('status_approval')
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'approved' => 'success',
                        'rejected' => 'danger',
                    }),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                // ViewAction::make(),

                Action::make('pdf')
                    ->label('PDF')
                    ->icon('heroicon-o-document-arrow-down')
                    ->color('success')
                    ->url(fn ($record) => route('surat.pdf', $record))
                    ->openUrlInNewTab()
                    ->visible(fn ($record) => $record->status_approval === 'approved'),
            ]);
    }
}

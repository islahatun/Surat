<?php

namespace App\Filament\Resources\ApprovalSurats\Tables;

use Filament\Actions\Action;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Notifications\Notification;

class ApprovalSuratsTable
{
    public static function configure(Table $table): Table
    {
        return $table
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
                    ->badge(),
            ])
            ->recordActions([
                Action::make('approve')
                    ->label('Approve')
                    ->color('success')
                    ->requiresConfirmation()
                    ->action(function ($record) {
                        $record->update([
                            'status_approval' => 'approved',
                        ]);

                        Notification::make()
                            ->title('Surat berhasil di-approve')
                            ->success()
                            ->send();
                    }),

                Action::make('reject')
                    ->label('Reject')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->action(function ($record) {
                        $record->update([
                            'status_approval' => 'rejected',
                        ]);

                        Notification::make()
                            ->title('Surat berhasil ditolak')
                            ->danger()
                            ->send();
                    }),
            ]);
    }
}
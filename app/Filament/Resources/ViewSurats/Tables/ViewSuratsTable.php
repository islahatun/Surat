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
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;

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
                        default => 'gray',
                    }),
            ])
            ->filters([
                TrashedFilter::make(),
                
                SelectFilter::make('jenis_surat')
                    ->label('Jenis Surat')
                    ->options([
                        1 => 'Surat KTP',
                        2 => 'Surat KK',
                        3 => 'Surat Domisili',
                        4 => 'SKTM',
                        5 => 'Surat Pindah',
                        6 => 'Surat Usaha',
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        // 1. Ambil semua parameter dari URL (jenis, startDate, endDate)
                        $jenisDariUrl = request()->query('jenis');
                        $startDate    = request()->query('startDate');
                        $endDate      = request()->query('endDate');

                        // 2. Jalankan filter Tanggal Mulai jika ada di URL
                        if ($startDate) {
                            $query->whereDate('created_at', '>=', $startDate);
                        }

                        // 3. Jalankan filter Tanggal Selesai jika ada di URL
                        if ($endDate) {
                            $query->whereDate('created_at', '<=', $endDate);
                        }

                        // 4. Jalankan filter Jenis Surat jika ada di URL
                        if ($jenisDariUrl) {
                            $query->where('jenis_surat', $jenisDariUrl);
                        }

                        // Jika tidak diakses dari dashboard (akses normal lewat sidebar), 
                        // gunakan filter bawaan dari UI dropdown select-nya
                        return $query->when(
                            $data['value'],
                            fn (Builder $query, $value): Builder => $query->where('jenis_surat', $value),
                        );
                    }),
            ])
            ->recordActions([
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
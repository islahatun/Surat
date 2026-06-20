<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Schema;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;

class Dashboard extends BaseDashboard
{
    use HasFiltersForm;

    public function filtersForm(Schema $form): Schema
    {
        return $form
            ->components([
                // Langsung masukkan DatePicker di sini tanpa dibungkus Section
                DatePicker::make('startDate')
                    ->label('Tanggal Mulai')
                    ->maxDate(now()),
                    
                DatePicker::make('endDate')
                    ->label('Tanggal Selesai')
                    ->maxDate(now()),
            ]);
    }
}
<?php

namespace App\Filament\Widgets;

use App\Models\Penduduk;
use App\Models\Surat; // Pastikan import model Surat Anda
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Carbon\Carbon;
use Filament\Widgets\Concerns\InteractsWithPageFilters;

class RekapSuratDashboard extends BaseWidget
{
    use InteractsWithPageFilters;
    protected ?string $pollingInterval = '10s';

    protected function getStats(): array
    {
        $tahunIni = Carbon::now()->year;


        $countPenduduk = Penduduk::query();
        
        $startDate = $this->filters['startDate'] ?? null;
        $endDate = $this->filters['endDate'] ?? null;

        $query = Surat::query();

        if ($startDate) {
            $query->whereDate('created_at', '>=', $startDate);
            $countPenduduk->whereDate('created_at', '>=', $startDate);
        }

        if ($endDate) {
            $query->whereDate('created_at', '<=', $endDate);
            $countPenduduk->whereDate('created_at', '<=', $endDate);
        }

        return [
            Stat::make('Total Penduduk', $countPenduduk->count())
                ->color('secondary'),
                
            Stat::make('Surat KTP', (clone $query)->where('jenis_surat', 1)->count())
                ->color('primary'),

            Stat::make('Surat KK', (clone $query)->where('jenis_surat', 2)->count())
                ->color('success'),

            Stat::make('Surat Domisili', (clone $query)->where('jenis_surat', 3)->count())
                ->color('info'),

            Stat::make('SKTM', (clone $query)->where('jenis_surat', 4)->count())
                ->color('warning'),

            Stat::make('Surat Pindah', (clone $query)->where('jenis_surat', 5)->count())
                ->color('danger'),

            Stat::make('Surat Usaha', (clone $query)->where('jenis_surat', 6)->count())
                ->color('gray'),
        ];
    }
}

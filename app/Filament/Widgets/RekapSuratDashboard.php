<?php

namespace App\Filament\Widgets;

use App\Models\Penduduk;
use App\Models\Surat; 
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Carbon\Carbon;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use App\Filament\Resources\ViewSurats\ViewSuratResource; 

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

        $baseUrlSurat = ViewSuratResource::getUrl('index');

        $dateParams = '';
        if ($startDate) {
            $dateParams .= '&startDate=' . $startDate;
        }
        if ($endDate) {
            $dateParams .= '&endDate=' . $endDate;
        }

        return [
            Stat::make('Total Penduduk', $countPenduduk->count())
                ->color('secondary'),
                
            Stat::make('Surat KTP', (clone $query)->where('jenis_surat', 1)->count())
                ->color('primary')
                ->url($baseUrlSurat . '?jenis=1' . $dateParams),

            Stat::make('Surat KK', (clone $query)->where('jenis_surat', 2)->count())
                ->color('success')
                ->url($baseUrlSurat . '?jenis=2' . $dateParams),

            Stat::make('Surat Domisili', (clone $query)->where('jenis_surat', 3)->count())
                ->color('info')
                ->url($baseUrlSurat . '?jenis=3' . $dateParams),

            Stat::make('SKTM', (clone $query)->where('jenis_surat', 4)->count())
                ->color('warning')
                ->url($baseUrlSurat . '?jenis=4' . $dateParams),

            Stat::make('Surat Pindah', (clone $query)->where('jenis_surat', 5)->count())
                ->color('danger')
                ->url($baseUrlSurat . '?jenis=5' . $dateParams),

            Stat::make('Surat Usaha', (clone $query)->where('jenis_surat', 6)->count())
                ->color('gray')
                ->url($baseUrlSurat . '?jenis=6' . $dateParams),
        ];
    }
}
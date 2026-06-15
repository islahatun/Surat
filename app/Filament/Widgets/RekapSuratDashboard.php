<?php

namespace App\Filament\Widgets;

use App\Models\Penduduk;
use App\Models\Surat; // Pastikan import model Surat Anda
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Carbon\Carbon;

class RekapSuratDashboard extends BaseWidget
{
    // Mengatur agar widget otomatis reload/refresh setiap 10 detik (opsional)
    protected ?string $pollingInterval = '10s';

    protected function getStats(): array
    {
        // 1. Ambil tahun saat ini untuk filter surat reject
        $tahunIni = Carbon::now()->year;

        // 2. Hitung data dari database
        $countPenduduk = Penduduk::count();
        
        // Sesuaikan 'status_approval' dan nilainya (misal: 'pending', 'approved', 'rejected') dengan database Anda
        $suratPending = Surat::where('status_approval', 'pending')->count();
        $suratApproved = Surat::where('status_approval', 'approved')->count();
        $suratRejectedPertahun = Surat::where('status_approval', 'rejected')
                                      ->whereYear('created_at', $tahunIni)
                                      ->count();

        return [
            // Card 1: Total Penduduk
            Stat::make('Total Penduduk', $countPenduduk)
                ->description('Semua penduduk terdaftar')
                ->descriptionIcon('heroicon-m-users')
                ->color('info'),

            // Card 2: Surat Belum Di-approve
            Stat::make('Belum Di-approve', $suratPending)
                ->description('Menunggu persetujuan')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),

            // Card 3: Surat Sudah Di-approve
            Stat::make('Sudah Di-approve', $suratApproved)
                ->description('Surat telah selesai')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),

            // Card 4: Surat Direject Tahun Ini
            Stat::make('Surat Ditolak (' . $tahunIni . ')', $suratRejectedPertahun)
                ->description('Total reject tahun ini')
                ->descriptionIcon('heroicon-m-x-circle')
                ->color('danger'),
        ];
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Surat;
use App\Models\User;
use App\Models\DetailSuratUsaha;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class SuratPdfController extends Controller
{
    public function generate($suratId)
    {
        $surat = Surat::findOrFail($suratId);
        $kepalaDesa = User::where('role', '2')->first();

        // 2. Ambil data nama & nik, lalu amankan jika datanya null/kosong
        $namaKades = $kepalaDesa->name ?? 'Nama Kepala Desa';
        $nikKades = $kepalaDesa->nik ?? '----------------------';
        $noSurat = $surat->no_surat;

        // 3. Susun teks string yang akan dimasukkan ke dalam QR Code
        $qrData = "Dokumen Sah Kelurahan Sangiang\n" .
                  "Ditandatangani oleh Kepala Desa\n" .
                  "Nama: " . $namaKades . "\n" .
                  "NIK: " . $nikKades . "\n" .
                  "No Surat: " . $noSurat;

        // 4. Generate QR Code ke dalam bentuk Base64 string agar aman di DomPDF
        $qrcodeBase64 = 'data:image/svg+xml;base64,' . base64_encode(
            QrCode::format('svg')
                ->size(100)
                ->errorCorrection('L')
                ->generate($qrData)
        );

        if($surat->jenis_surat == 1){
            $pdf = Pdf::loadView('pdf.surat_pengantar_ktp', ['surat' => $surat, 'kepalaDesa' => $kepalaDesa, 'qrcodeBase64' => $qrcodeBase64]);
            return $pdf->download('surat_pengantar_ktp.pdf');
        }else if($surat->jenis_surat == 2){
            $pdf = Pdf::loadView('pdf.surat_pengantar_kk', ['surat' => $surat, 'kepalaDesa' => $kepalaDesa, 'qrcodeBase64' => $qrcodeBase64]);
            return $pdf->download('surat_pengantar_kk.pdf');

        }else if($surat->jenis_surat == 3){
            $pdf = Pdf::loadView('pdf.surat_domisili', ['surat' => $surat, 'kepalaDesa' => $kepalaDesa, 'qrcodeBase64' => $qrcodeBase64]);
            return $pdf->download('surat_domisili.pdf');
        }else if($surat->jenis_surat == 4){
            $pdf = Pdf::loadView('pdf.surat_sktm', ['surat' => $surat, 'kepalaDesa' => $kepalaDesa, 'qrcodeBase64' => $qrcodeBase64]);
            return $pdf->download('surat_sktm.pdf');

        }else if($surat->jenis_surat == 5){
            $pdf = Pdf::loadView('pdf.surat_pindah', ['surat' => $surat, 'kepalaDesa' => $kepalaDesa, 'qrcodeBase64' => $qrcodeBase64]);
            return $pdf->download('surat_pindah.pdf');
        }else if($surat->jenis_surat == 6){
            $detailSuratUsaha = DetailSuratUsaha::where('surat_id', $surat->id)->first();
            $pdf = Pdf::loadView('pdf.surat_usaha', ['surat' => $surat, 'detailSuratUsaha' => $detailSuratUsaha, 'kepalaDesa' => $kepalaDesa, 'qrcodeBase64' => $qrcodeBase64]);
            return $pdf->download('surat_usaha.pdf');
        }
    
    }
}

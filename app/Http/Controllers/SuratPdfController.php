<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Surat;
use App\Models\User;
use App\Models\DetailSuratUsaha;

class SuratPdfController extends Controller
{
    public function generate($suratId)
    {
        $surat = Surat::findOrFail($suratId);
        $kepalaDesa = User::where('role', '2')->first();
        if($surat->jenis_surat == 1){
            $pdf = Pdf::loadView('pdf.surat_pengantar_ktp', ['surat' => $surat, 'kepalaDesa' => $kepalaDesa]);
            return $pdf->download('surat_pengantar_ktp.pdf');
        }else if($surat->jenis_surat == 2){
            $pdf = Pdf::loadView('pdf.surat_pengantar_kk', ['surat' => $surat, 'kepalaDesa' => $kepalaDesa]);
            return $pdf->download('surat_pengantar_kk.pdf');

        }else if($surat->jenis_surat == 3){
            $pdf = Pdf::loadView('pdf.surat_domisili', ['surat' => $surat, 'kepalaDesa' => $kepalaDesa]);
            return $pdf->download('surat_domisili.pdf');
        }else if($surat->jenis_surat == 4){
            $pdf = Pdf::loadView('pdf.surat_sktm', ['surat' => $surat, 'kepalaDesa' => $kepalaDesa]);
            return $pdf->download('surat_sktm.pdf');

        }else if($surat->jenis_surat == 5){
            $pdf = Pdf::loadView('pdf.surat_pindah', ['surat' => $surat, 'kepalaDesa' => $kepalaDesa]);
            return $pdf->download('surat_pindah.pdf');
        }else if($surat->jenis_surat == 6){
            $detailSuratUsaha = DetailSuratUsaha::where('surat_id', $surat->id)->first();
            $pdf = Pdf::loadView('pdf.surat_usaha', ['surat' => $surat, 'detailSuratUsaha' => $detailSuratUsaha, 'kepalaDesa' => $kepalaDesa]);
            return $pdf->download('surat_usaha.pdf');
        }
    
    }
}

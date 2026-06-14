<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class SuratPdfController extends Controller
{
    public function generate($suratId)
    {
        $dataSurat = Surat::findOrFail($suratId);
        if($dataSurat->jenis_surat == 1){
            $pdf = Pdf::loadView('pdf.surat_pengantar_ktp', ['dataSurat' => $dataSurat]);
            return $pdf->download('surat_pengantar_ktp.pdf');
        }else if($dataSurat->jenis_surat == 2){
            $pdf = Pdf::loadView('pdf.surat_pengantar_kk', ['dataSurat' => $dataSurat]);
            return $pdf->download('surat_pengantar_kk.pdf');

        }else if($dataSurat->jenis_surat == 3){
            $pdf = Pdf::loadView('pdf.surat_domisili', ['dataSurat' => $dataSurat]);
            return $pdf->download('surat_domisili.pdf');
        }else if($dataSurat->jenis_surat == 4){
            $pdf = Pdf::loadView('pdf.surat_sktm', ['dataSurat' => $dataSurat]);
            return $pdf->download('surat_sktm.pdf');

        }else if($dataSurat->jenis_surat == 5){
            $pdf = Pdf::loadView('pdf.surat_pindah', ['dataSurat' => $dataSurat]);
            return $pdf->download('surat_pindah.pdf');
        }else if($dataSurat->jenis_surat == 6){
            $pdf = Pdf::loadView('pdf.surat_usaha', ['dataSurat' => $dataSurat]);
            return $pdf->download('surat_usaha.pdf');
        }
    
    }
}

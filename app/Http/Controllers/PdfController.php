<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController
{
    public function cetakJadwal()
    {
        $jadwals = Jadwal::all();
        $data = [
            'title' => 'Data Jadwal'
        ];
        $pdf = Pdf::loadView('back.admin.data.jadwal.generate-jadwal-pdf', $data);
        return $pdf->download('Data Jadwal.pdf'); 
    }
}

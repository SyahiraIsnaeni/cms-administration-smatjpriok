<?php

namespace App\Http\Controllers;

use App\Models\KritikSaran;
use App\Services\KritikSaranService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class KritikSaranController
{
    protected $kritikSaranService;

    public function __construct(KritikSaranService $kritikSaranService)
    {
        $this->kritikSaranService = $kritikSaranService;
    }

    public function kritikSaran():Response{

        $kritikSaran = $this->kritikSaranService->get();

        return response()
            ->view("back.admin.konten.beranda.kritik-saran.view", [
                "title" => "Data Kritik dan Saran",
                "kritik_sarans" => $kritikSaran
            ]);
    }

    public function deleteDataKritikSaran($id): Response|RedirectResponse
    {
        $this->kritikSaranService->delete($id);
        Alert::success('Sukses', 'Berhasil Menghapus Data Kritik dan Saran');
        return redirect()->route('kritik-saran');
    }//
}

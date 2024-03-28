<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use App\Services\BeritaService;
use App\Services\EkstrakurikulerService;
use App\Services\KritikSaranService;
use App\Services\PengumumanService;
use App\Services\PrestasiService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class BerandaController
{
    protected $ekstrakurikulerService;
    protected $prestasiService;
    protected $beritaService;
    protected $pengumumanService;
    protected $kritikSaranService;

    public function __construct(
        EkstrakurikulerService $ekstrakurikulerService,
        PrestasiService $prestasiService,
        BeritaService $beritaService,
        PengumumanService $pengumumanService,
        KritikSaranService $kritikSaranService
    )
    {
        $this->ekstrakurikulerService = $ekstrakurikulerService;
        $this->prestasiService = $prestasiService;
        $this->beritaService = $beritaService;
        $this->pengumumanService = $pengumumanService;
        $this->kritikSaranService = $kritikSaranService;
    }

    public function index(Request $request): Response
    {
        $ekstrakurikulers = $this->ekstrakurikulerService->getAll();
        $prestasis = $this->prestasiService->getFewData();
        $pengumumans = $this->pengumumanService->getFewData();
        $beritaHp = $this->beritaService->getFewDataHp();
        $beritaDekstop = $this->beritaService->getFewDataDekstop();
        $berita = $this->beritaService->getFirstData();

        $status = "";

        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'nama' => 'required',
                'email' => 'required|email',
                'isi' => 'required',
            ]);

            if ($validator->fails()) {
                $status = "Pastikan Semua Data Terisi dan Sesuai Ketentuan";
            } else {
                $data = [
                    'nama' => $request->input('nama'),
                    'email' => $request->input('email'),
                    'isi' => $request->input('isi'),
                ];

                $this->kritikSaranService->add($data);

                $status = "Berhasil mengirim kritik dan saran";
            }
        }

        return response()
            ->view("front.beranda", [
                "ekstrakurikulers" => $ekstrakurikulers,
                "prestasis" => $prestasis,
                "pengumumans" => $pengumumans,
                "beritasHp" => $beritaHp,
                "beritasDekstop" => $beritaDekstop,
                "berita" => $berita,
                "status" => $status
            ]);
    }
}

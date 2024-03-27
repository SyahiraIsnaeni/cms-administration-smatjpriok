<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use App\Services\BeritaService;
use App\Services\EkstrakurikulerService;
use App\Services\PengumumanService;
use App\Services\PrestasiService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BerandaController
{
    protected $ekstrakurikulerService;
    protected $prestasiService;
    protected $beritaService;
    protected $pengumumanService;

    public function __construct(EkstrakurikulerService $ekstrakurikulerService,
    PrestasiService $prestasiService, BeritaService $beritaService, PengumumanService $pengumumanService)
    {
        $this->ekstrakurikulerService = $ekstrakurikulerService;
        $this->prestasiService = $prestasiService;
        $this->beritaService = $beritaService;
        $this->pengumumanService = $pengumumanService;
    }

    public function index():Response{

        $ekstrakurikulers = $this->ekstrakurikulerService->getAll();
        $prestasis = $this->prestasiService->getFewData();
        $pengumumans = $this->pengumumanService->getFewData();
        $beritaHp = $this->beritaService->getFewDataHp();
        $beritaDekstop= $this->beritaService->getFewDataDekstop();
        $berita = $this->beritaService->getFirstData();

        return response()
            ->view("front.beranda", [
                "ekstrakurikulers" => $ekstrakurikulers,
                "prestasis" => $prestasis,
                "pengumumans" => $pengumumans,
                "beritasHp" => $beritaHp,
                "beritasDekstop" => $beritaDekstop,
                "berita" => $berita,
            ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use App\Services\BeritaService;
use App\Services\EkstrakurikulerService;
use App\Services\PrestasiService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BerandaController
{
    protected $ekstrakurikulerService;
    protected $prestasiService;
    protected $beritaService;

    public function __construct(EkstrakurikulerService $ekstrakurikulerService,
    PrestasiService $prestasiService, BeritaService $beritaService)
    {
        $this->ekstrakurikulerService = $ekstrakurikulerService;
        $this->prestasiService = $prestasiService;
        $this->beritaService = $beritaService;
    }

    public function index():Response{

        $ekstrakurikulers = $this->ekstrakurikulerService->getAll();
        $prestasis = $this->prestasiService->getFewData();
        $beritaHp = $this->beritaService->getFewDataHp();
        $beritaDekstop= $this->beritaService->getFewDataDekstop();
        $berita = $this->beritaService->getFirstData();

        return response()
            ->view("front.beranda", [
                "ekstrakurikulers" => $ekstrakurikulers,
                "prestasis" => $prestasis,
                "beritasHp" => $beritaHp,
                "beritasDekstop" => $beritaDekstop,
                "berita" => $berita,
            ]);
    }
}

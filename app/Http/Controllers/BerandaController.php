<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use App\Services\EkstrakurikulerService;
use App\Services\PrestasiService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BerandaController
{
    protected $ekstrakurikulerService;
    protected $prestasiService;

    public function __construct(EkstrakurikulerService $ekstrakurikulerService,
    PrestasiService $prestasiService)
    {
        $this->ekstrakurikulerService = $ekstrakurikulerService;
        $this->prestasiService = $prestasiService;
    }

    public function index():Response{

        $ekstrakurikulers = $this->ekstrakurikulerService->getAll();
        $prestasis = $this->prestasiService->getFewData();

        return response()
            ->view("front.beranda", [
                "ekstrakurikulers" => $ekstrakurikulers,
                "prestasis" => $prestasis,
            ]);
    }
}

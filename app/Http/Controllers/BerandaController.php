<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use App\Services\EkstrakurikulerService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BerandaController
{
    protected $ekstrakurikulerService;

    public function __construct(EkstrakurikulerService $ekstrakurikulerService)
    {
        $this->ekstrakurikulerService = $ekstrakurikulerService;
    }

    public function index():Response{

        $ekstrakurikulers = $this->ekstrakurikulerService->get();

        return response()
            ->view("front.beranda", [
                "ekstrakurikulers" => $ekstrakurikulers
            ]);
    }
}

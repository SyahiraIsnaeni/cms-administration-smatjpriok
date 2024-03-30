<?php

namespace App\Http\Controllers;

use App\Services\PrestasiService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FrontendPrestasiController
{
    protected $prestasiService;
    public function __construct(
        PrestasiService $prestasiService,
    )
    {
        $this->prestasiService = $prestasiService;
    }
    public function index():Response{
        $prestasis = $this->prestasiService->get();
        return response()
            ->view("front.prestasi", [
                "prestasis" => $prestasis,
            ]);
    }
}

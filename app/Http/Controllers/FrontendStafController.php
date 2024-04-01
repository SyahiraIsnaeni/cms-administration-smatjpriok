<?php

namespace App\Http\Controllers;

use App\Services\StafService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FrontendStafController
{
    protected $stafService;
    public function __construct(
        StafService $stafService,
    )
    {
        $this->stafService = $stafService;
    }
    public function index():Response{
        $stafs = $this->stafService->get();
        return response()
            ->view("front.data-staf", [
                "stafs" => $stafs,
            ]);
    }
}

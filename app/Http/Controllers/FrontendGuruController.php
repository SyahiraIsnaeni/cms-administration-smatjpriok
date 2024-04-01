<?php

namespace App\Http\Controllers;

use App\Services\GuruService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FrontendGuruController
{
    protected $guruService;
    public function __construct(
        GuruService $guruService,
    )
    {
        $this->guruService = $guruService;
    }
    public function index():Response{
        $gurus = $this->guruService->get();
        return response()
            ->view("front.data-guru", [
                "gurus" => $gurus,
            ]);
    }
}

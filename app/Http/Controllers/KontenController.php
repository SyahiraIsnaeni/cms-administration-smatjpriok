<?php

namespace App\Http\Controllers;

use App\Services\BlogService;
use App\Services\GaleriService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class KontenController
{
    protected $galeriService;
    protected $blogService;

    public function __construct(
        GaleriService $galeriService,
        BlogService $blogService,
    )
    {
        $this->galeriService = $galeriService;
        $this->blogService = $blogService;
    }

    public function index(): Response{
        $galeris = $this->galeriService->getFewData();
        $blogs = $this->blogService->getAll();

        return response()
            ->view("front.konten", [
                "galeris" => $galeris,
                "blogs" => $blogs,
            ]);
    }
}

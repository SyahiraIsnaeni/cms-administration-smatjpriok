<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Services\BeritaService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FrontendBeritaController
{
    protected $beritaService;

    public function __construct(
        BeritaService $beritaService,
    )
    {
        $this->beritaService = $beritaService;
    }

    public function list():Response{
        $beritas = $this->beritaService->getAll();
        return response()
            ->view("front.list-berita", [
                "beritas" => $beritas,
            ]);
    }

    public function detail($slug):Response{
        $berita = Berita::withTrashed()->where('slug', $slug)->first();
        $nextBerita = Berita::withTrashed()->whereNotIn('slug', [$slug])->where('is_active', '1')->limit(5)->orderByDesc('created_at')->get();
        return response()
            ->view("front.detail-berita", [
                "berita" => $berita,
                "nextBerita" => $nextBerita
            ]);
    }
}

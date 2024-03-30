<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use App\Services\PengumumanService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FrontendPengumumanController
{

    protected $pengumumanService;

    public function __construct(
        PengumumanService $pengumumanService,
    )
    {
        $this->pengumumanService = $pengumumanService;
    }
    public function list():Response{
        $pengumumans = $this->pengumumanService->getAll();
        return response()
            ->view("front.list-pengumuman", [
                "pengumumans" => $pengumumans,
            ]);
    }

    public function detail($slug):Response{
        $pengumuman = Pengumuman::where('slug', $slug)->first();
        $nextPengumuman = Pengumuman::whereNotIn('slug', [$slug])->where('is_active', '1')->limit(4)->orderByDesc('created_at')->get();
        return response()
            ->view("front.detail-pengumuman", [
                "pengumuman" => $pengumuman,
                "nextPengumuman" => $nextPengumuman
            ]);
    }
}

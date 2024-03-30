<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FrontendGaleriController
{
    public function detail($id):Response{
        $galeri = Galeri::where('id', $id)->first();
        $nextGaleri = Galeri::whereNotIn('id', [$id])->limit(3)->orderByDesc('created_at')->get();
        return response()
            ->view("front.detail-galeri", [
                "galeri" => $galeri,
                "nextGaleri" => $nextGaleri
            ]);
    }
}

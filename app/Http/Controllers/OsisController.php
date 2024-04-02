<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OsisController
{

    public function dashboard():Response{

        $blog= Blog::all()->sortByDesc('updated_at');
        $galeri = Galeri::all();

        $drafBlog = Blog::where('is_active', '0')->get();
        return response()
            ->view("back.osis.dashboard", compact('blog','drafBlog', 'galeri'));
    }
}

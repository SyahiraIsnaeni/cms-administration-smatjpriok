<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Blog;
use App\Models\Pengumuman;
use App\Models\Prestasi;
use Illuminate\Http\Response;

class AdminController
{
    public function dashboard():Response{

        $pengumuman = Pengumuman::all()->sortByDesc('updated_at');
        $berita = Berita::all()->sortByDesc('updated_at');
        $blog= Blog::all()->sortByDesc('updated_at');
        $prestasi= Prestasi::all();

        $drafPengumuman = Pengumuman::where('is_active', '0')->get();
        $drafBerita = Berita::where('is_active', '0')->get();
        $drafBlog = Blog::where('is_active', '0')->get();

        return response()
            ->view("back.admin.dashboard",  compact('prestasi','pengumuman', 'berita', 'blog', 'drafBerita', 'drafPengumuman', 'drafBlog'));
    }
}

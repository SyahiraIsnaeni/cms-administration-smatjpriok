<?php

namespace App\Http\Controllers;

use App\Services\BlogService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use RealRashid\SweetAlert\Facades\Alert;

class RiwayatBlogController
{
    protected $blogService;

    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    public function riwayatBlog(): Response{
        $blog = $this->blogService->history();

        return response()
            ->view("back.admin.konten.riwayat.blog", [
                "title" => "Data Riwayat Blog",
                "blogs" => $blog
            ]);
    }

    public function restoreBlog($id): Response|RedirectResponse{
        $this->blogService->restore($id);
        Alert::success('Sukses', 'Berhasil Memulihkan Data Blog');
        return redirect()->route('riwayat-blog');
    }

    public function deleteBlog($id): Response|RedirectResponse{
        $this->blogService->hardDelete($id);
        Alert::success('Sukses', 'Berhasil Menghapus Permanen Data Blog');
        return redirect()->route('riwayat-blog');
    }
}

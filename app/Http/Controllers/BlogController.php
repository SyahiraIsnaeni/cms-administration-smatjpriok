<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Services\BlogService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class BlogController
{
    protected $blogService;

    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    public function blog():Response{

        $blog = $this->blogService->get();

        return response()
            ->view("back.admin.konten.beranda.blog.view", [
                "title" => "Data Blog",
                "blogs" => $blog
            ]);
    }

    public function addBlog():Response{
        return response()
            ->view("back.admin.konten.beranda.blog.add", [
                "title" => "Tambah Data Blog",
            ]);
    }

    public function addDataBlog(Request $request):Response|RedirectResponse{
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'penulis' => 'required',
            'konten' => 'required',
            'gambar' => 'required|image|mimes:jpeg,jpg,png',
            'is_active' => 'required',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Pastikan Semua Data Terisi dan Sesuai Ketentuan');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'judul' => $request->input('judul'),
            'penulis' => $request->input('penulis'),
            'slug' => Str::slug($request->input('judul')),
            'konten' => $request->input('konten'),
            'gambar' => $request->file('gambar'),
            'is_active' => $request->input('is_active'),
        ];

        $this->blogService->add($data);

        Alert::success('Sukses', 'Berhasil Menambah Data Blog');

        return redirect()->route('blog');
    }

    public function editBlog($id):Response{
        $blog = Blog::findOrFail($id);
        return response()
            ->view("back.admin.konten.beranda.blog.edit", [
                "title" => "Edit Data Blog",
                "blog" => $blog,
            ]);
    }

    public function editDataBlog(int $id, Request $request): Response|RedirectResponse
    {
        if (($request->input('judul') == null) || ($request->input('penulis') == null) ||
            ($request->input('konten') == null)) {
            Alert::error('Gagal', 'Pastikan Tidak Ada Data yang kosong');
            return redirect()->back();
        }

        $validator = Validator::make($request->all(), [
            'gambar' => 'image|mimes:jpeg,jpg,png',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Pastikan Data Sesuai Format');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'judul' => $request->input('judul'),
            'penulis' => $request->input('penulis'),
            'slug' => Str::slug($request->input('judul')),
            'konten' => $request->input('konten'),
            'gambar' => $request->file('gambar'),
            'is_active' => $request->input('is_active'),
        ];

        $this->blogService->edit($id, $data);

        Alert::success('Sukses', 'Berhasil Mengubah Data Blog');

        return redirect()->route('blog');
    }

    public function deleteDataBlog($id): Response|RedirectResponse
    {
        $this->blogService->softDelete($id);
        Alert::success('Sukses', 'Berhasil Menghapus Data Blog');
        return redirect()->route('blog');
    }
}

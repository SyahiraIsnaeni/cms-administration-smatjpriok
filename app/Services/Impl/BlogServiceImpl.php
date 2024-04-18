<?php

namespace App\Services\Impl;

use App\Models\Berita;
use App\Models\Blog;
use App\Services\BlogService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Ramsey\Collection\Collection;

class BlogServiceImpl implements BlogService
{
    public function get(): LengthAwarePaginator
    {
        return Blog::orderBy('created_at', 'desc')->paginate(12);
    }

    public function getAll(): LengthAwarePaginator
    {
        return Blog::withTrashed()->where('is_active', 1)->orderBy('created_at', 'desc')->paginate(8);
    }

    public function add(array $data): Blog
    {
        $blog = new Blog();
        $blog->judul = $data['judul'];
        $blog->penulis = $data['penulis'];
        $blog->slug = $data['slug'];
        $blog->konten = $data['konten'];
        $blog->is_active = $data['is_active'];

        if (isset($data['gambar'])) {
            $originalName = $data['gambar']->getClientOriginalName();
            $namaFile = Str::slug(pathinfo($originalName, PATHINFO_FILENAME), '_');
            $gambarPath = $data['gambar']->storeAs('public/blog', $namaFile);
            $blog->gambar = $namaFile;
        }

        $blog->save();

        return $blog;
    }

    public function edit(int $id, array $data): Blog
    {
        $blog = Blog::findOrFail($id);

        $blog->judul = $data['judul'];
        $blog->penulis = $data['penulis'];
        $blog->slug = $data['slug'];
        $blog->konten = $data['konten'];
        $blog->is_active = $data['is_active'];

        if (isset($data['gambar'])) {
            if ($blog->gambar) {
                Storage::delete('public/blog' . $blog->gambar);
            }

            $originalName = $data['gambar']->getClientOriginalName();
            $namaFile = Str::slug(pathinfo($originalName, PATHINFO_FILENAME), '_');
            $gambarPath = $data['gambar']->storeAs('public/blog/', $namaFile);
            $blog->gambar = $namaFile;
        }

        $blog->save();

        return $blog;
    }

    public function softDelete(int $id): bool
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return true;
    }

    public function hardDelete(int $id): bool
    {
        $blog = Blog::onlyTrashed()->findOrFail($id);
        Storage::delete('public/blog/' . $blog->gambar);
        $blog->forceDelete();
        return true;
    }

    public function restore(int $id): bool{
        $blog = Blog::onlyTrashed()->findOrFail($id);
        $blog->restore();
        return true;
    }

    public function history(): LengthAwarePaginator{
        $blog = Blog::onlyTrashed()->orderBy('created_at', 'desc')->paginate(10);
        return $blog;
    }
}

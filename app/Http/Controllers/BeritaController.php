<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Services\BeritaService;
use App\Services\KategoriBeritaService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class BeritaController
{
    protected $beritaService;
    protected $kategoriBeritaService;

    public function __construct(BeritaService $beritaService, KategoriBeritaService $kategoriBeritaService)
    {
        $this->beritaService = $beritaService;
        $this->kategoriBeritaService = $kategoriBeritaService;
    }

    public function berita():Response{

        $berita = $this->beritaService->get();

        return response()
            ->view("back.admin.konten.beranda.berita.view", [
                "title" => "Data Berita",
                "beritas" => $berita
            ]);
    }

    public function addBerita():Response{
        return response()
            ->view("back.admin.konten.beranda.berita.add", [
                "title" => "Tambah Data Berita",
                "kategori_beritas" => $this->kategoriBeritaService->get()
            ]);
    }

    public function addDataBerita(Request $request):Response|RedirectResponse{
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'penulis' => 'required',
            'konten' => 'required',
            'kategori_berita_id' => 'required',
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
            'kategori_berita_id' => $request->input('kategori_berita_id'),
            'gambar' => $request->file('gambar'),
            'is_active' => $request->input('is_active'),
        ];

        $this->beritaService->add($data);

        Alert::success('Sukses', 'Berhasil Menambah Data Berita');

        return redirect()->route('berita');
    }

    public function editBerita($id):Response{
        $berita = Berita::findOrFail($id);
        return response()
            ->view("back.admin.konten.beranda.berita.edit", [
                "title" => "Edit Data Berita",
                "berita" => $berita,
                "kategori_beritas" => $this->kategoriBeritaService->get()
            ]);
    }

    public function editDataBerita(int $id, Request $request): Response|RedirectResponse
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
            'kategori_berita_id' => $request->input('kategori_berita_id'),
            'gambar' => $request->file('gambar'),
            'is_active' => $request->input('is_active'),
        ];

        $this->beritaService->edit($id, $data);

        Alert::success('Sukses', 'Berhasil Mengubah Data Berita');

        return redirect()->route('berita');
    }

    public function deleteDataBerita($id): Response|RedirectResponse
    {
        $this->beritaService->softDelete($id);
        Alert::success('Sukses', 'Berhasil Menghapus Data Berita');
        return redirect()->route('berita');
    }
}

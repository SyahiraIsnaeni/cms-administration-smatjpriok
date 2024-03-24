<?php

namespace App\Http\Controllers;

use App\Models\KategoriBerita;
use App\Services\KategoriBeritaService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriBeritaController
{
    protected $kategoriBeritaService;

    public function __construct(KategoriBeritaService $kategoriBeritaService)
    {
        $this->kategoriBeritaService = $kategoriBeritaService;
    }

    public function kategoriBerita():Response{

        $kategori = $this->kategoriBeritaService->get();

        return response()
            ->view("back.admin.konten.kategori.kategori-berita.view", [
                "title" => "Data Kategori Berita",
                "kategori_beritas" => $kategori
            ]);
    }

    public function addKategoriBerita():Response{
        return response()
            ->view("back.admin.konten.kategori.kategori-berita.add", [
                "title" => "Tambah Data Kategori Berita",
            ]);
    }

    public function addDataKategoriBerita(Request $request):Response|RedirectResponse{
        $validator = Validator::make($request->all(), [
            'kategori' => 'required',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Pastikan Data Terisi');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'kategori' => $request->input('kategori'),
            'slug' => Str::slug($request->input('kategori'))
        ];

        $this->kategoriBeritaService->add($data);

        Alert::success('Sukses', 'Berhasil Menambah Data Kategori Berita');

        return redirect()->route('kategori-berita');
    }

    public function editKategoriBerita($id):Response{
        $kategori = KategoriBerita::findOrFail($id);
        return response()
            ->view("back.admin.konten.kategori.kategori-berita.edit", [
                "title" => "Edit Data Kategori Berita",
                "kategori_beritas" => $kategori
            ]);
    }

    public function editDataKategoriBerita(int $id, Request $request): Response|RedirectResponse
    {
        if (($request->input('kategori') == null)) {
            Alert::error('Gagal', 'Pastikan Tidak Ada Data yang kosong');
            return redirect()->back();
        }

        $data = [
            'kategori' => $request->input('kategori'),
            'slug' => Str::slug($request->input('kategori')),
        ];

        $this->kategoriBeritaService->edit($id, $data);

        Alert::success('Sukses', 'Berhasil Mengubah Data Kategori Berita');

        return redirect()->route('kategori-berita');
    }

    public function deleteDataKategoriBerita($id): Response|RedirectResponse
    {
        try {
            $this->kategoriBeritaService->delete($id);
            Alert::success('Sukses', 'Berhasil Menghapus Data Kategori Berita');
        } catch (\Throwable $th) {
            Alert::error('Gagal', 'Data Kategori Berita tidak dapat dihapus karena masih digunakan di data berita lain');
        }

        return redirect()->route('kategori-berita');
    }
}

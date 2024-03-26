<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use App\Models\Galeri;
use App\Services\EkstrakurikulerService;
use App\Services\GaleriService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class GaleriController
{
    protected $galeriService;

    public function __construct(GaleriService $galeriService)
    {
        $this->galeriService = $galeriService;
    }

    public function galeri():Response{

        $galeris = $this->galeriService->get();

        return response()
            ->view("back.admin.konten.galeri.view", [
                "title" => "Data Ektrakurikuler",
                "galeris" => $galeris
            ]);
    }

    public function addGaleri():Response{
        return response()
            ->view("back.admin.konten.galeri.add", [
                "title" => "Tambah Data Galeri Kegiatan",
            ]);
    }

    public function addDataGaleri(Request $request):Response|RedirectResponse{
        $validator = Validator::make($request->all(), [
            'judul' => 'required|max:40',
            'thumbnail' => 'required|image|mimes:jpeg,jpg,png',
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,jpg,png',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Pastikan Semua Data Terisi dan Sesuai Ketentuan');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'judul' => $request->input('judul'),
            'thumbnail' => $request->file('thumbnail'),
            'images' => $request->file('images'),
        ];

        $this->galeriService->add($data);

        Alert::success('Sukses', 'Berhasil Menambah Data Galeri Kegiatan');

        return redirect()->route('galeri');
    }

    public function editGaleri($id):Response{
        $galeri = Galeri::findOrFail($id);
        return response()
            ->view("back.admin.konten.galeri.edit", [
                "title" => "Edit Data Galeri Kegiatan",
                "galeri" => $galeri
            ]);
    }

    public function editDataGaleri(int $id, Request $request): Response|RedirectResponse
    {
        if (($request->input('judul') == null)) {
            Alert::error('Gagal', 'Pastikan Tidak Ada Data yang kosong');
            return redirect()->back();
        }

        $validator = Validator::make($request->all(), [
            'judul' => 'max:40',
            'thumbnail' => 'image|mimes:jpeg,jpg,png',
            'images' => 'array',
            'images.*' => 'image|mimes:jpeg,jpg,png',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Pastikan Data Sesuai Format');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'judul' => $request->input('judul'),
            'thumbnail' => $request->file('thumbnail'),
            'images' => $request->file('images')
        ];

        $this->galeriService->edit($id, $data);

        Alert::success('Sukses', 'Berhasil Mengubah Data Galeri Kegiatan');

        return redirect()->route('galeri');
    }

    public function deleteDataGaleri($id): Response|RedirectResponse
    {
        $this->galeriService->delete($id);
        Alert::success('Sukses', 'Berhasil Menghapus Data Galeri Kegiatan');
        return redirect()->route('galeri');
    }
}

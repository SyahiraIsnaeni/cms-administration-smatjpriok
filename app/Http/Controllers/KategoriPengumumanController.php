<?php

namespace App\Http\Controllers;

use App\Models\KategoriPengumuman;
use App\Services\KategoriPengumumanService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriPengumumanController
{
    protected $kategoriPengumumanService;

    public function __construct(KategoriPengumumanService $kategoriPengumumanService)
    {
        $this->kategoriPengumumanService = $kategoriPengumumanService;
    }

    public function kategoriPengumuman():Response{

        $kategori = $this->kategoriPengumumanService->get();

        return response()
            ->view("back.admin.konten.kategori.kategori-pengumuman.view", [
                "title" => "Data Kategori Pengumuman",
                "kategori_pengumumans" => $kategori
            ]);
    }

    public function addKategoriPengumuman():Response{
        return response()
            ->view("back.admin.konten.kategori.kategori-pengumuman.add", [
                "title" => "Tambah Data Kategori Pengumuman",
            ]);
    }

    public function addDataKategoriPengumuman(Request $request):Response|RedirectResponse{
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

        $this->kategoriPengumumanService->add($data);

        Alert::success('Sukses', 'Berhasil Menambah Data Kategori Pengumuman');

        return redirect()->route('kategori-pengumuman');
    }

    public function editKategoriPengumuman($id):Response{
        $kategori = KategoriPengumuman::findOrFail($id);
        return response()
            ->view("back.admin.konten.kategori.kategori-pengumuman.edit", [
                "title" => "Edit Data Kategori Pengumuman",
                "kategori_pengumumans" => $kategori
            ]);
    }

    public function editDataKategoriPengumuman(int $id, Request $request): Response|RedirectResponse
    {
        if (($request->input('kategori') == null)) {
            Alert::error('Gagal', 'Pastikan Tidak Ada Data yang kosong');
            return redirect()->back();
        }

        $data = [
            'kategori' => $request->input('kategori'),
            'slug' => Str::slug($request->input('kategori')),
        ];

        $this->kategoriPengumumanService->edit($id, $data);

        Alert::success('Sukses', 'Berhasil Mengubah Data Prestasi');

        return redirect()->route('kategori-pengumuman');
    }

    public function deleteDataKategoriPengumuman($id): Response|RedirectResponse
    {
        $this->kategoriPengumumanService->delete($id);
        Alert::success('Sukses', 'Berhasil Menghapus Data Prestasi');
        return redirect()->route('kategori-pengumuman');
    }
}

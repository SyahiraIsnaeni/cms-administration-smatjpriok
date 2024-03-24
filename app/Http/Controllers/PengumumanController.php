<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use App\Services\KategoriPengumumanService;
use App\Services\PengumumanService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class PengumumanController
{
    protected $pengumumanService;
    protected $kategoriPengumumanService;

    public function __construct(PengumumanService $pengumumanService, KategoriPengumumanService $kategoriPengumumanService)
    {
        $this->pengumumanService = $pengumumanService;
        $this->kategoriPengumumanService = $kategoriPengumumanService;
    }

    public function pengumuman():Response{

        $pengumuman = $this->pengumumanService->get();

        return response()
            ->view("back.admin.konten.beranda.pengumuman.view", [
                "title" => "Data Pengumuman",
                "pengumumans" => $pengumuman
            ]);
    }

    public function addPengumuman():Response{
        return response()
            ->view("back.admin.konten.beranda.pengumuman.add", [
                "title" => "Tambah Data Pengumuman",
                "kategori_pengumumans" => $this->kategoriPengumumanService->get()
            ]);
    }

    public function addDataPengumuman(Request $request):Response|RedirectResponse{
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'penulis' => 'required',
            'konten' => 'required',
            'kategori_pengumuman_id' => 'required',
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
            'kategori_pengumuman_id' => $request->input('kategori_pengumuman_id'),
            'gambar' => $request->file('gambar'),
            'dokumen' => $request->file('dokumen'),
            'is_active' => $request->input('is_active'),
        ];

        $this->pengumumanService->add($data);

        Alert::success('Sukses', 'Berhasil Menambah Data Pengumuman');

        return redirect()->route('pengumuman');
    }

    public function editPengumuman($id):Response{
        $pengumuman = Pengumuman::findOrFail($id);
        return response()
            ->view("back.admin.konten.beranda.pengumuman.edit", [
                "title" => "Edit Data Pengumuman",
                "pengumuman" => $pengumuman,
                "kategori_pengumumans" => $this->kategoriPengumumanService->get()
            ]);
    }

    public function editDataPengumuman(int $id, Request $request): Response|RedirectResponse
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
            'kategori_pengumuman_id' => $request->input('kategori_pengumuman_id'),
            'gambar' => $request->file('gambar'),
            'dokumen' => $request->file('dokumen'),
            'is_active' => $request->input('is_active'),
        ];

        $this->pengumumanService->edit($id, $data);

        Alert::success('Sukses', 'Berhasil Mengubah Data Pengumuman');

        return redirect()->route('pengumuman');
    }

    public function deleteDataPengumuman($id): Response|RedirectResponse
    {
        $this->pengumumanService->softDelete($id);
        Alert::success('Sukses', 'Berhasil Menghapus Data Pengumuman');
        return redirect()->route('pengumuman');
    }
}

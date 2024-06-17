<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Services\PerpustakaanService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class BukuController
{
    protected $bukuService;

    public function __construct(PerpustakaanService $bukuService)
    {
        $this->bukuService = $bukuService;
    }

    public function buku():Response
    {
        $bukus = $this->bukuService->getBuku();

        return response()
            ->view("back.perpustakaan.buku.view", [
                "title" => "Data Buku",
                "bukus" => $bukus
            ]);
    }

    public function addBuku():Response{
        return response()
            ->view("back.perpustakaan.buku.add", [
                "title" => "Tambah Data Buku Perpustakaan",
            ]);
    }

    public function editBuku($id):Response{
        $buku = Buku::findOrFail($id);
        return response()
            ->view("back.perpustakaan.buku.edit", [
                "title" => "Edit Data Buku Perpustakaan",
                "buku" => $buku
            ]);
    }

    public function addDataBuku(Request $request):Response | RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'penerbit' => 'required',
            'jumlah' => 'required',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Pastikan Semua Data Terisi');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'judul' => $request->input('judul'),
            'penerbit' => $request->input('penerbit'),
            'jumlah' => $request->input('jumlah'),
        ];

        try {
            $this->bukuService->addBuku($data);
            Alert::success('Sukses', 'Berhasil Menambah Data Buku');
            return redirect()->route('buku-perpus');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menambah data buku');
            return redirect()->back();
        }
    }

    public function editDataBuku(int $id, Request $request): Response|RedirectResponse
    {
        if (($request->input('judul') == null) || ($request->input('penerbit') == null) || ($request->input('jumlah') == null)) {
            Alert::error('Gagal', 'Pastikan Semua Data Tidak Kosong');
            return redirect()->back();
        }

        $data = [
            'judul' => $request->input('judul'),
            'penerbit' => $request->input('penerbit'),
            'jumlah' => $request->input('jumlah'),
        ];

        try {
            $this->bukuService->editBuku($id, $data);
            Alert::success('Sukses', 'Berhasil Mengubah Data Buku');
            return redirect()->route('buku-perpus');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat mengedit data buku');
            return redirect()->back();
        }

    }

    public function deleteDataBuku($id):Response | RedirectResponse
    {
        try {
            $this->bukuService->deleteBuku($id);
            Alert::success('Sukses', 'Berhasil Menghapus Data Buku');
        } catch (\Exception $e) {
            Alert::error('Error', 'Data buku dipakai pada data lain');
            return redirect()->back();
        }
        return redirect()->route('buku-perpus');
    }
}

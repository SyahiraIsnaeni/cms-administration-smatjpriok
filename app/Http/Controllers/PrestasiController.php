<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use App\Services\PrestasiService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PrestasiController
{
    protected $prestasiService;

    public function __construct(PrestasiService $prestasiService)
    {
        $this->prestasiService = $prestasiService;
    }

    public function prestasi():Response{

        $prestasi = $this->prestasiService->get();

        return response()
            ->view("back.admin.konten.beranda.prestasi.view", [
                "title" => "Data Prestasi",
                "prestasis" => $prestasi
            ]);
    }

    public function addPrestasi():Response{
        return response()
            ->view("back.admin.konten.beranda.prestasi.add", [
                "title" => "Tambah Data Prestasi",
            ]);
    }

    public function addDataPrestasi(Request $request):Response|RedirectResponse{
        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:20',
            'gambar' => 'required|image|mimes:jpeg,jpg,png',
            'kejuaraan' => 'required|max:40',
            'deskripsi' => 'required|max:100',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Pastikan Semua Data Terisi dan Sesuai Ketentuan');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'nama' => $request->input('nama'),
            'kejuaraan' => $request->input('kejuaraan'),
            'gambar' => $request->file('gambar'),
            'deskripsi' => $request->input('deskripsi'),
        ];

        $this->prestasiService->add($data);

        Alert::success('Sukses', 'Berhasil Menambah Data Prestasi');

        return redirect()->route('prestasi');
    }

    public function editPrestasi($id):Response{
        $prestasi = Prestasi::findOrFail($id);
        return response()
            ->view("back.admin.konten.beranda.prestasi.edit", [
                "title" => "Edit Data Prestasi",
                "prestasi" => $prestasi
            ]);
    }

    public function editDataPrestasi(int $id, Request $request): Response|RedirectResponse
    {
        if (($request->input('nama') == null) || ($request->input('kejuaraan') == null) || ($request->input('deskripsi') == null)) {
            Alert::error('Gagal', 'Pastikan Tidak Ada Data yang kosong');
            return redirect()->back();
        }

        $validator = Validator::make($request->all(), [
            'nama' => 'max:20',
            'gambar' => 'image|mimes:jpeg,jpg,png',
            'kejuaraan' => 'max:40',
            'deskripsi' => 'max:100',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Pastikan Data Sesuai Format');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'nama' => $request->input('nama'),
            'kejuaraan' => $request->input('kejuaraan'),
            'deskripsi' => $request->input('deskripsi'),
            'gambar' => $request->file('gambar'),
        ];

        $this->prestasiService->edit($id, $data);

        Alert::success('Sukses', 'Berhasil Mengubah Data Prestasi');

        return redirect()->route('prestasi');
    }

    public function deleteDataPrestasi($id): Response|RedirectResponse
    {
        $this->prestasiService->delete($id);
        Alert::success('Sukses', 'Berhasil Menghapus Data Prestasi');
        return redirect()->route('prestasi');
    }
}

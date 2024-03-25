<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Services\FasilitasService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class FasilitasController
{
    protected $fasilitasService;

    public function __construct(FasilitasService $fasilitasService)
    {
        $this->fasilitasService = $fasilitasService;
    }

    public function fasilitas():Response{

        $fasilitas = $this->fasilitasService->get();

        return response()
            ->view("back.admin.konten.profil.fasilitas.view", [
                "title" => "Data Fasilitas Sekolah",
                "fasilitas" => $fasilitas
            ]);
    }

    public function addFasilitas():Response{
        return response()
            ->view("back.admin.konten.profil.fasilitas.add", [
                "title" => "Tambah Data Fasilitas",
            ]);
    }

    public function addDataFasilitas(Request $request):Response|RedirectResponse{
        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:20',
            'gambar' => 'required|image|mimes:jpeg,jpg,png',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Pastikan Semua Data Terisi dan Sesuai Ketentuan');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'nama' => $request->input('nama'),
            'gambar' => $request->file('gambar'),
        ];

        $this->fasilitasService->add($data);

        Alert::success('Sukses', 'Berhasil Menambah Data Fasilitas');

        return redirect()->route('fasilitas');
    }

    public function editFasilitas($id):Response{
        $fasilitas = Fasilitas::findOrFail($id);
        return response()
            ->view("back.admin.konten.profil.fasilitas.edit", [
                "title" => "Edit Data Fasilitas",
                "fasilitas" => $fasilitas,
            ]);
    }

    public function editDataFasilitas(int $id, Request $request): Response|RedirectResponse
    {
        if ($request->input('nama') == null) {
            Alert::error('Gagal', 'Pastikan Tidak Ada Data yang kosong');
            return redirect()->back();
        }

        $validator = Validator::make($request->all(), [
            'nama' => 'max:20',
            'gambar' => 'image|mimes:jpeg,jpg,png',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Pastikan Data Sesuai Format');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'nama' => $request->input('nama'),
            'gambar' => $request->file('gambar'),
        ];

        $this->fasilitasService->edit($id, $data);

        Alert::success('Sukses', 'Berhasil Mengubah Data Fasilitas');

        return redirect()->route('fasilitas');
    }

    public function deleteDataFasilitas($id): Response|RedirectResponse
    {
        $this->fasilitasService->delete($id);
        Alert::success('Sukses', 'Berhasil Menghapus Data Fasilitas');
        return redirect()->route('fasilitas');
    }
}

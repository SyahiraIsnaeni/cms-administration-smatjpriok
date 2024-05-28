<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Services\KelasService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class KelasController
{
    protected $kelasService;

    public function __construct(KelasService $kelasService)
    {
        $this->kelasService = $kelasService;
    }

    public function kelas():Response{

        $kelas = $this->kelasService->get();

        return response()
            ->view("back.admin.data.kelas.view", [
                "title" => "Data Kelas",
                "kelas" => $kelas
            ]);
    }

    public function addKelas():Response{
        return response()
            ->view("back.admin.data.kelas.add", [
                "title" => "Tambah Data Kelas",
            ]);
    }

    public function addDataKelas(Request $request):Response|RedirectResponse{
        $validator = Validator::make($request->all(), [
            'nama_kelas' => 'required',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Pastikan Data Terisi');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'nama_kelas' => $request->input('nama_kelas'),
        ];

        try {
            $this->kelasService->add($data);
            Alert::success('Sukses', 'Berhasil Menambah Data Kelas');
            return redirect()->route('kelas');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menambah data kelas. Pastikan nama kelas tidak sama dengan data kelas lainnya');
            return redirect()->back();
        }
    }

    public function editKelas($id):Response{
        $kelas = Kelas::findOrFail($id);
        return response()
            ->view("back.admin.data.kelas.edit", [
                "title" => "Edit Data Kelas",
                "kelas" => $kelas,
            ]);
    }

    public function editDataKelas(int $id, Request $request): Response|RedirectResponse
    {
        if (($request->input('nama_kelas') == null)) {
            Alert::error('Gagal', 'Pastikan Data Nama Kelas Tidak Kosong');
            return redirect()->back();
        }

        $data = [
            'nama_kelas' => $request->input('nama_kelas'),
        ];

        try {
            $this->kelasService->edit($id, $data);
            Alert::success('Sukses', 'Berhasil Mengubah Data Kelas');
            return redirect()->route('kelas');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat mengedit data kelas. Pastikan nama kelas tidak sama dengan data lainnya');
            return redirect()->back();
        }

    }

    public function deleteDataKelas($id): Response|RedirectResponse
    {
        try {
            DB::beginTransaction();
            $this->kelasService->delete($id);
            DB::commit();

            Alert::success('Sukses', 'Berhasil Menghapus Data Kelas');
            return redirect()->route('kelas');
        } catch (\Exception $e) {
            DB::rollBack();

            Alert::error('Gagal', 'Pastikan data kelas tidak dipakai pada data siswa, mata pelajaran, dan sistem e-learning.');
            return redirect()->back();
        }
    }
}

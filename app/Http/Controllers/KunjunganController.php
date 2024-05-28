<?php

namespace App\Http\Controllers;

use App\Services\PerpustakaanService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Kunjungan;
use App\Models\Kelas;
use Illuminate\Support\Carbon;


class KunjunganController
{
    protected $kunjunganService;

    public function __construct(PerpustakaanService $kunjunganService)
    {
        $this->kunjunganService = $kunjunganService;
    }
    public function kunjungan():Response
    {
        $kunjungan = $this->kunjunganService->getKunjungan();

        return response()
            ->view("back.admin.perpustakaan.kunjungan.kunjungan", [
                "title" => "Data Kunjungan",
                "kunjungan" => $kunjungan
            ]);
    }

    public function addKunjungan():Response{
        return response()
            ->view("back.admin.perpustakaan.kunjungan.add", [
                "title" => "Tambah Data Kunjungan Perpustakaan",
            ]);
    }

    public function editKunjungan($id):Response{
        $kunjungan = Kunjungan::findOrFail($id);
        return response()
            ->view("back.admin.perpustakaan.kunjungan.edit", [
                "title" => "Edit Data Kunjungan Perpustakaan",
                "kunjungan" => $kunjungan
            ]);
    }

    public function addDataKunjungan(Request $request):Response | RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Pastikan Data Terisi');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'nama' => $request->input('nama'),
        ];

        try {
            $this->kunjunganService->addKunjungan($data);
            Alert::success('Sukses', 'Berhasil Menambah Data Kunjungan');
            return redirect()->route('kunjungan');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menambah data kunjungan');
            return redirect()->back();
        }
    }

    public function editDataKunjungan(int $id, Request $request): Response|RedirectResponse
    {
        if (($request->input('nama') == null)) {
            Alert::error('Gagal', 'Pastikan Data Nama Tidak Kosong');
            return redirect()->back();
        }

        $data = [
            'nama' => $request->input('nama'),
        ];

        try {
            $this->kunjunganService->editKunjungan($id, $data);
            Alert::success('Sukses', 'Berhasil Mengubah Data Kunjungan');
            return redirect()->route('kunjungan');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat mengedit data kunjungan');
            return redirect()->back();
        }

    }

    public function deleteKunjungan($id):Response | RedirectResponse
    {
        $this->kunjunganService->deleteKunjungan($id);
        Alert::success('Sukses', 'Berhasil Menghapus Data Kunjungan');
        return redirect()->route('kunjungan');
    }
}

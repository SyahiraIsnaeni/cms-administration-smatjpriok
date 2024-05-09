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

    public function searchNama(Request $request):Response | RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Pastikan nama terisi');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $nama = $this->kunjunganService->searchSiswaOrGuru($request->input('nama'));

        return response()
            ->view("back.admin.perpustakaan.kunjungan.detail", [
                "title" => "Data Kunjungan",
                "nama" => $nama
            ]);
    }

    public function berkunjung($id, $type, Request $request):Response | RedirectResponse
    {
        try {
            if ($type == "siswa") {
                $this->kunjunganService->addKunjunganSiswa($id);
            } elseif($type == "guru") {
                $this->kunjunganService->addKunjunganGuru($id);
            }

            Alert::success('Sukses', 'Berhasil Menambah Data Kunjungan');
            return redirect()->route('kunjungan');
        } catch (\Exception $e) {
            Alert::error('Gagal', $e->getMessage());
            return redirect()->route('kunjungan');
        }
    }

    public function deleteKunjungan($id):Response | RedirectResponse
    {
        $this->kunjunganService->deleteKunjungan($id);
        Alert::success('Sukses', 'Berhasil Menghapus Data Kunjungan');
        return redirect()->route('kunjungan');
    }
}

<?php

namespace App\Http\Controllers;

use App\Services\KelasService;
use App\Services\PerpustakaanService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Kelas;
use Illuminate\Support\Carbon;


class PeminjamanController
{
    protected $peminjamanService;

    protected $kelasService;


    public function __construct(PerpustakaanService $peminjamanService, KelasService $kelasService)
    {
        $this->peminjamanService = $peminjamanService;
        $this->kelasService = $kelasService;
    }


    public function peminjaman():Response
    {
        $peminjaman = $this->peminjamanService->getPeminjaman();
        return response()
            ->view("back.admin.perpustakaan.peminjaman.view", [
                "title" => "Data Peminjaman Buku",
                "peminjaman" => $peminjaman
            ]);
    }

    public function addPeminjaman():Response
    {
        $kelas = $this->kelasService->get();
        return response()
            ->view("back.admin.perpustakaan.peminjaman.add", [
                "title" => "Tambah Data Peminjaman Buku",
                "kelas" => $kelas
            ]);
    }

    public function addDataPeminjaman(Request $request):Response | RedirectResponse
    {
        $kelas = $this->kelasService->get();

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'kelas_id' => 'required',
            'judul_buku' => 'required',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Pastikan semua data terisi');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            "nama" => $request->input("nama"),
            "kelas_id" => $request->input("kelas_id"),
            "judul_buku" => $request->input("judul_buku"),
        ];

        $this->peminjamanService->addPeminjaman($data);

        Alert::success('Sukses', 'Berhasil Menambah Data Peminjaman');
        return redirect()->route('peminjaman');
    }

    public function editPeminjaman($id):Response
    {
        $kelas = $this->kelasService->get();
        $peminjaman = Peminjaman::findOrFail($id);
        $kelasTerpilih = $peminjaman->kelas->id;
        return response()
            ->view("back.admin.perpustakaan.peminjaman.edit", [
                "title" => "Tambah Data Peminjaman Buku",
                "kelas" => $kelas,
                "peminjaman" => $peminjaman,
                "kelasTerpilih" => $kelasTerpilih
            ]);
    }

    public function editDataPeminjaman($id, Request $request):Response | RedirectResponse
    {
        if ($request->input("nama") == null || $request->input("judul_buku") == null){
            Alert::error('Gagal', 'Pastikan semua data terisi');
            return redirect()->back();
        }

        $data = [
            "nama" => $request->input("nama"),
            "kelas_id" => $request->input("kelas_id"),
            "judul_buku" => $request->input("judul_buku"),
        ];

        $this->peminjamanService->editPeminjaman($id, $data);

        Alert::success('Sukses', 'Berhasil Mengubah Data Peminjaman');
        return redirect()->route('peminjaman');
    }

    public function deletePeminjaman($id):Response | RedirectResponse
    {
        $this->peminjamanService->deletePeminjaman($id);
        Alert::success('Sukses', 'Berhasil Menghapus Data Peminjaman');
        return redirect()->route('peminjaman');
    }

    public function dikembalikanPeminjaman($id):Response | RedirectResponse
    {
        $this->peminjamanService->dikembalikan($id);
        Alert::success('Sukses', 'Berhasil Mengubah Status Data Peminjaman');
        return redirect()->route('peminjaman');
    }

}

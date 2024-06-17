<?php

namespace App\Http\Controllers;

use App\Models\Buku;
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


    public function __construct(PerpustakaanService $peminjamanService)
    {
        $this->peminjamanService = $peminjamanService;
    }

    public function peminjaman():Response
    {
        $peminjaman = $this->peminjamanService->getPeminjaman();
        return response()
            ->view("back.perpustakaan.peminjaman.view", [
                "title" => "Data Peminjaman Buku",
                "peminjaman" => $peminjaman
            ]);
    }

    public function addPeminjaman():Response
    {
        return response()
            ->view("back.perpustakaan.peminjaman.add", [
                "title" => "Tambah Data Peminjaman Buku",
            ]);
    }

    public function searchDataPeminjaman(Request $request):Response
    {
        $judul = $request->input('judul');

        $buku = $this->peminjamanService->searchBuku($judul);

        return response()
            ->view('back.perpustakaan.peminjaman.search', [
            'buku' => $buku,
            'title' => "Cari Buku"
            ]);
    }

    public function addDataPeminjamanDetail($id):Response
    {
        $buku = Buku::findOrFail($id);
        return response()
            ->view('back.perpustakaan.peminjaman.add-detail', [
                'buku' => $buku,
                'title' => "Detail Tambah Peminjaman"
            ]);
    }

    public function addDataPeminjaman($id,Request $request):Response | RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'jumlah' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'telepon' => 'required',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Pastikan semua data terisi');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->input("jumlah") < 1){
            Alert::error('Gagal', 'Pastikan jumlah buku yang dipinjam lebih dari 0');
            return redirect()->back();
        }

        $data = [
            "jumlah" => $request->input("jumlah"),
            "kelas" => $request->input("kelas"),
            "nama" => $request->input("nama"),
            "telepon" => $request->input("telepon"),
        ];

        $this->peminjamanService->addPeminjaman($id, $data);

        Alert::success('Sukses', 'Berhasil Menambah Data Peminjaman');
        return redirect()->route('peminjaman-perpus');
    }

    public function editPeminjaman($id):Response
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $buku = $peminjaman->buku;
        return response()
            ->view("back.perpustakaan.peminjaman.edit", [
                "title" => "Tambah Data Peminjaman Buku",
                "peminjaman" => $peminjaman,
                "buku" => $buku
            ]);
    }

    public function editDataPeminjaman($id, Request $request):Response | RedirectResponse
    {
        if ($request->input("nama") == null || $request->input("jumlah") == null || $request->input("kelas") == null || $request->input("telepon") == null){
            Alert::error('Gagal', 'Pastikan semua data terisi');
            return redirect()->back();
        }

        if ($request->input("jumlah") < 1){
            Alert::error('Gagal', 'Pastikan jumlah buku yang dipinjam lebih dari 0');
            return redirect()->back();
        }

        $data = [
            "jumlah" => $request->input("jumlah"),
            "kelas" => $request->input("kelas"),
            "nama" => $request->input("nama"),
            "telepon" => $request->input("telepon"),
        ];

        $this->peminjamanService->editPeminjaman($id, $data);

        Alert::success('Sukses', 'Berhasil Mengubah Data Peminjaman');
        return redirect()->route('peminjaman-perpus');
    }

    public function deletePeminjaman($id):Response | RedirectResponse
    {
        $this->peminjamanService->deletePeminjaman($id);
        Alert::success('Sukses', 'Berhasil Menghapus Data Peminjaman');
        return redirect()->route('peminjaman-perpus');
    }

    public function dikembalikanPeminjaman($id):Response | RedirectResponse
    {
        $this->peminjamanService->dikembalikan($id);
        Alert::success('Sukses', 'Berhasil Mengubah Status Data Peminjaman');
        return redirect()->route('peminjaman-perpus');
    }

    public function batalDikembalikanPeminjaman($id):Response | RedirectResponse
    {
        $this->peminjamanService->batalDikembalikan($id);
        Alert::success('Sukses', 'Berhasil Mengubah Status Data Peminjaman');
        return redirect()->route('peminjaman-perpus');
    }

}

<?php

namespace App\Http\Controllers;

use App\Services\BeritaService;
use App\Services\KategoriBeritaService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use RealRashid\SweetAlert\Facades\Alert;

class RiwayatBeritaController
{
    protected $beritaService;

    public function __construct(BeritaService $beritaService)
    {
        $this->beritaService = $beritaService;
    }

    public function riwayatBerita(): Response{
        $berita = $this->beritaService->history();

        return response()
            ->view("back.admin.konten.riwayat.berita", [
                "title" => "Data Riwayat Berita",
                "beritas" => $berita
            ]);
    }

    public function restoreBerita($id): Response|RedirectResponse{
        $this->beritaService->restore($id);
        Alert::success('Sukses', 'Berhasil Memulihkan Data Berita');
        return redirect()->route('riwayat-berita');
    }

    public function deleteBerita($id): Response|RedirectResponse{
        $this->beritaService->hardDelete($id);
        Alert::success('Sukses', 'Berhasil Menghapus Permanen Data Berita');
        return redirect()->route('riwayat-berita');
    }


}

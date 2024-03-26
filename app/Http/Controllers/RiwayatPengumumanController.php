<?php

namespace App\Http\Controllers;

use App\Services\BlogService;
use App\Services\PengumumanService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use RealRashid\SweetAlert\Facades\Alert;

class RiwayatPengumumanController
{
    protected $pengumumanService;

    public function __construct(PengumumanService $pengumumanService)
    {
        $this->pengumumanService = $pengumumanService;
    }

    public function riwayatPengumuman(): Response{
        $pengumuman = $this->pengumumanService->history();

        return response()
            ->view("back.admin.konten.riwayat.pengumuman", [
                "title" => "Data Riwayat Pengumuman",
                "pengumumans" => $pengumuman
            ]);
    }

    public function restorePengumuman($id): Response|RedirectResponse{
        $this->pengumumanService->restore($id);
        Alert::success('Sukses', 'Berhasil Memulihkan Data Pengumuman');
        return redirect()->route('riwayat-pengumuman');
    }

    public function deletePengumuman($id): Response|RedirectResponse{
        $this->pengumumanService->hardDelete($id);
        Alert::success('Sukses', 'Berhasil Menghapus Permanen Data Pengumuman');
        return redirect()->route('riwayat-pengumuman');
    }
}

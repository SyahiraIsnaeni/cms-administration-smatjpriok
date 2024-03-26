<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use App\Models\StrukturOrganisasi;
use App\Services\PrestasiService;
use App\Services\StrukturOrganisasiService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class StrukturOrganisasiController
{
    protected $strukturOrganisasiService;

    public function __construct(StrukturOrganisasiService $strukturOrganisasiService)
    {
        $this->strukturOrganisasiService = $strukturOrganisasiService;
    }

    public function strukturOrganisasi():Response{

        $struktur = $this->strukturOrganisasiService->get();

        return response()
            ->view("back.admin.konten.profil.struktur-organisasi.view", [
                "title" => "Data Struktur Organisasi",
                "struktur_organisasis" => $struktur
            ]);
    }

    public function addStrukturOrganisasi():Response{
        return response()
            ->view("back.admin.konten.profil.struktur-organisasi.add", [
                "title" => "Tambah Data Struktur Organisasi",
            ]);
    }

    public function addDataStrukturOrganisasi(Request $request):Response|RedirectResponse{

        if ($this->strukturOrganisasiService->get()->count() > 0) {
            Alert::error('Gagal', 'Tidak dapat menambahkan data struktur organisasi lebih dari satu');
            return redirect()->route('struktur-organisasi');
        }

        $validator = Validator::make($request->all(), [
            'kepsek' => 'required',
            'wakil_kurikulum' => 'required',
            'wakil_kesiswaan' => 'required',
            'wakil_sarpras' => 'required',
            'bk' => 'required',
            'osis' => 'required',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Pastikan Semua Data Terisi');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'kepsek' => $request->input('kepsek'),
            'wakil_kurikulum' => $request->input('wakil_kurikulum'),
            'wakil_kesiswaan' => $request->input('wakil_kesiswaan'),
            'wakil_sarpras' => $request->input('wakil_sarpras'),
            'bk' => $request->input('bk'),
            'osis' => $request->input('osis'),
        ];

        $this->strukturOrganisasiService->add($data);

        Alert::success('Sukses', 'Berhasil Menambah Data Struktur Organisasi');

        return redirect()->route('struktur-organisasi');
    }

    public function editStrukturOrganisasi($id):Response{
        $struktur = StrukturOrganisasi::findOrFail($id);
        return response()
            ->view("back.admin.konten.profil.struktur-organisasi.edit", [
                "title" => "Edit Data Struktur Organisasi",
                "struktur" => $struktur
            ]);
    }

    public function editDataStrukturOrganisasi(int $id, Request $request): Response|RedirectResponse
    {
        if (($request->input('kepsek') == null) || ($request->input('wakil_kurikulum') == null) ||
            ($request->input('wakil_kesiswaan') == null) || ($request->input('wakil_sarpras') == null)
        || ($request->input('bk') == null) || ($request->input('osis') == null)) {
            Alert::error('Gagal', 'Pastikan Tidak Ada Data yang kosong');
            return redirect()->back();
        }

        $data = [
            'kepsek' => $request->input('kepsek'),
            'wakil_kurikulum' => $request->input('wakil_kurikulum'),
            'wakil_kesiswaan' => $request->input('wakil_kesiswaan'),
            'wakil_sarpras' => $request->input('wakil_sarpras'),
            'bk' => $request->input('bk'),
            'osis' => $request->input('osis'),
        ];

        $this->strukturOrganisasiService->edit($id, $data);

        Alert::success('Sukses', 'Berhasil Mengubah Data Struktur Organisasi');

        return redirect()->route('struktur-organisasi');
    }

    public function deleteDataStrukturOrganisasi($id): Response|RedirectResponse
    {
        $this->strukturOrganisasiService->delete($id);
        Alert::success('Sukses', 'Berhasil Menghapus Data Struktur Organisasi');
        return redirect()->route('struktur-organisasi');
    }
}

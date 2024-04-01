<?php

namespace App\Http\Controllers;

use App\Models\Staf;
use App\Services\StafService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class StafController
{
    protected $stafService;

    public function __construct(StafService $stafService)
    {
        $this->stafService = $stafService;
    }

    public function staf():Response{

        $staf = $this->stafService->get();

        return response()
            ->view("back.admin.data.staf.view", [
                "title" => "Data Staf",
                "stafs" => $staf
            ]);
    }

    public function addStaf():Response{
        return response()
            ->view("back.admin.data.staf.add", [
                "title" => "Tambah Data Staf",
            ]);
    }

    public function addDataStaf(Request $request):Response|RedirectResponse{
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nip' => 'required',
            'jabatan' => 'required',
            'foto' => 'image|mimes:jpeg,jpg,png',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Pastikan Semua Data Terisi dan Sesuai Ketentuan');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'nama' => $request->input('nama'),
            'nip' => $request->input('nip'),
            'jabatan' => $request->input('jabatan'),
            'foto' => $request->file('foto'),
            'email' => $request->input('email'),
        ];

        try {
            $this->stafService->add($data);
            Alert::success('Sukses', 'Berhasil Menambah Data Staf');
            return redirect()->route('staf');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menambah data Staf. Pastikan email dan nip tidak sama dengan data lainnya');
            return redirect()->back();
        }
    }

    public function editStaf($id):Response{
        $staf = Staf::findOrFail($id);
        return response()
            ->view("back.admin.data.staf.edit", [
                "title" => "Edit Data Staf",
                "staf" => $staf,
            ]);
    }

    public function editDataStaf(int $id, Request $request): Response|RedirectResponse
    {
        if (($request->input('nama') == null) || ($request->input('nip') == null) || ($request->input('jabatan') == null)) {
            Alert::error('Gagal', 'Pastikan Data Nama, NIP, dan Jabatan Tidak Kosong');
            return redirect()->back();
        }

        $validator = Validator::make($request->all(), [
            'foto' => 'image|mimes:jpeg,jpg,png',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Pastikan Data Sesuai Format');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'nama' => $request->input('nama'),
            'nip' => $request->input('nip'),
            'jabatan' => $request->input('jabatan'),
            'email' => $request->input('email'),
            'foto' => $request->file('foto'),
        ];

        $this->stafService->edit($id, $data);
        Alert::success('Sukses', 'Berhasil Mengubah Data Staf');
        return redirect()->route('staf');

//        try {
//            $this->stafService->edit($id, $data);
//            Alert::success('Sukses', 'Berhasil Mengubah Data Staf');
//            return redirect()->route('staf');
//        } catch (\Exception $e) {
//            Alert::error('Gagal', 'Terjadi kesalahan saat mengedit data staf. Pastikan email dan nip tidak sama dengan data lainnya');
//            return redirect()->back();
//        }

    }

    public function deleteDataStaf($id): Response|RedirectResponse
    {
        $this->stafService->delete($id);
        Alert::success('Sukses', 'Berhasil Menghapus Data Staf');
        return redirect()->route('staf');
    }

    public function deleteAllDataStaf(): Response|RedirectResponse
    {
        $this->stafService->deleteAll();
        Alert::success('Sukses', 'Berhasil Menghapus Semua Data Staf');
        return redirect()->route('staf');
    }

    public function importStaf():Response{
        return response()
            ->view("back.admin.data.staf.import", [
                "title" => "Import Data Staf",
            ]);
    }

    public function importDataStaf(Request $request):Response|RedirectResponse{

        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:xls,xlsx',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Pastikan Data Terisi dan Sesuai Format');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $this->stafService->addFromExcel($request->file('file'));
            Alert::success('Sukses', 'Berhasil Menambah Data Staf');
            return redirect()->route('staf');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menambah data staf. Pastikan tidak ada data yang kosong dan email tidak sama masing-masing datanya');
            return redirect()->back();
        }
    }
}

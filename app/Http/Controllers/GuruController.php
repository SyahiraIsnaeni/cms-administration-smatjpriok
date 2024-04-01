<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Services\GuruService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class GuruController
{
    protected $guruService;

    public function __construct(GuruService $guruService)
    {
        $this->guruService = $guruService;
    }

    public function guru():Response{

        $guru = $this->guruService->get();

        return response()
            ->view("back.admin.data.guru.view", [
                "title" => "Data Guru",
                "gurus" => $guru
            ]);
    }

    public function addGuru():Response{
        return response()
            ->view("back.admin.data.guru.add", [
                "title" => "Tambah Data Guru",
            ]);
    }

    public function addDataGuru(Request $request):Response|RedirectResponse{
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nip' => 'required',
            'foto' => 'image|mimes:jpeg,jpg,png',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Pastikan Semua Data Terisi dan Sesuai Ketentuan');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'nama' => $request->input('nama'),
            'nip' => $request->input('nip'),
            'foto' => $request->file('foto'),
            'email' => $request->input('email'),
        ];

        try {
            $this->guruService->add($data);
            Alert::success('Sukses', 'Berhasil Menambah Data Guru');
            return redirect()->route('guru');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menambah data guru. Pastikan email dan nip tidak sama dengan data lainnya');
            return redirect()->back();
        }
    }

    public function editGuru($id):Response{
        $guru = Guru::findOrFail($id);
        return response()
            ->view("back.admin.data.guru.edit", [
                "title" => "Edit Data Guru",
                "guru" => $guru,
            ]);
    }

    public function editDataGuru(int $id, Request $request): Response|RedirectResponse
    {
        if (($request->input('nama') == null) || ($request->input('nip') == null)) {
            Alert::error('Gagal', 'Pastikan Data Nama dan NIP Tidak Kosong');
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
            'email' => $request->input('email'),
            'foto' => $request->file('foto'),
        ];

        try {
            $this->guruService->edit($id, $data);
            Alert::success('Sukses', 'Berhasil Mengubah Data Guru');
            return redirect()->route('guru');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat mengedit data guru. Pastikan email dan nip tidak sama dengan data lainnya');
            return redirect()->back();
        }

    }

    public function deleteDataGuru($id): Response|RedirectResponse
    {
        $this->guruService->delete($id);
        Alert::success('Sukses', 'Berhasil Menghapus Data Guru');
        return redirect()->route('guru');
    }

    public function importGuru():Response{
        return response()
            ->view("back.admin.data.guru.import", [
                "title" => "Import Data Guru",
            ]);
    }

    public function importDataGuru(Request $request):Response|RedirectResponse{

        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:xls,xlsx',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Pastikan Data Terisi dan Sesuai Format');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $this->guruService->addFromExcel($request->file('file'));
            Alert::success('Sukses', 'Berhasil Menambah Data Guru');
            return redirect()->route('guru');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menambah data guru. Pastikan tidak ada data yang kosong dan email tidak sama masing-masing datanya');
            return redirect()->back();
        }
    }
}

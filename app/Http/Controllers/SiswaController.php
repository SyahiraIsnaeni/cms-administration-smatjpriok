<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Services\KelasService;
use App\Services\SiswaService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class SiswaController
{
    protected $siswaService;
    protected $kelasService;

    public function __construct(SiswaService $siswaService, KelasService $kelasService)
    {
        $this->siswaService = $siswaService;
        $this->kelasService = $kelasService;
    }

    public function kelas():Response{

        $kelas = $this->kelasService->get();

        return response()
            ->view("back.admin.data.siswa.view-kelas", [
                "title" => "Data Siswa Masing-Masing Kelas",
                "kelas" => $kelas
            ]);
    }

    public function siswa(int $kelasId):Response{

        $siswas = $this->siswaService->get($kelasId);
        $kelas = $this->kelasService->getId($kelasId);

        return response()
            ->view("back.admin.data.siswa.view-siswa", [
                "title" => "Data Siswa",
                "siswas" => $siswas,
                "kelas" => $kelas
            ]);
    }

    public function addSiswa(int $kelasId):Response{
        $kelas = $this->kelasService->getId($kelasId);
        return response()
            ->view("back.admin.data.siswa.add", [
                "title" => "Tambah Data Siswa",
                "kelas" => $kelas
            ]);
    }

        public function addDataSiswa(Request $request, int $kelasId):Response|RedirectResponse{
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nis' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Pastikan Semua Data Terisi');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'nama' => $request->input('nama'),
            'nis' => $request->input('nis'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'email' => $request->input('email'),
            'kelas_id' => $kelasId
        ];

        try {
            $this->siswaService->add($data);
            Alert::success('Sukses', 'Berhasil Menambah Data Siswa');
            return redirect()->route('detail-siswa', ['kelasId' => $kelasId]);
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menambah data siswa. Pastikan nis dan email tidak sama dengan data lainnya');
            return redirect()->back();
        }
    }

    public function editSiswa( int $kelasId, $id):Response{
        $siswa = Siswa::findOrFail($id);
        $kelas = $this->kelasService->getId($kelasId);
        return response()
            ->view("back.admin.data.siswa.edit", [
                "title" => "Edit Data Siswa",
                "siswa" => $siswa,
                "kelas" => $kelas,
            ]);
    }

    public function editDataSiswa( int $kelasId, int $id,  Request $request): Response|RedirectResponse
    {
        if (($request->input('nama') == null) || ($request->input('nis') == null)) {
            Alert::error('Gagal', 'Pastikan Data Nama dan NIS Tidak Kosong');
            return redirect()->back();
        }

        $data = [
            'nama' => $request->input('nama'),
            'nis' => $request->input('nis'),
            'email' => $request->input('email'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'kelas_id' =>$kelasId
        ];

        try {
            $this->siswaService->edit($id, $data);
            Alert::success('Sukses', 'Berhasil Mengubah Data Siswa');
            return redirect()->route('detail-siswa', ['kelasId' => $kelasId]);
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat mengedit data siswa. Pastikan nis dan email tidak sama dengan data lainnya');
            return redirect()->back();
        }

    }

    public function deleteDataSiswa($kelasId, $id): Response|RedirectResponse
    {
        $this->siswaService->delete($id);
        Alert::success('Sukses', 'Berhasil Menghapus Data Siswa');
        return redirect()->route('detail-siswa', ['kelasId' => $kelasId]);
    }

    public function deleteAllDataSiswa(int $kelasId): Response|RedirectResponse
    {
        $this->siswaService->deleteAll($kelasId);
        Alert::success('Sukses', 'Berhasil Menghapus Data Siswa');
        return redirect()->route('detail-siswa', ['kelasId' => $kelasId]);
    }

    public function importSiswa(int $kelasId):Response{
        $kelas = $this->kelasService->getId($kelasId);
        return response()
            ->view("back.admin.data.siswa.import", [
                "title" => "Import Data Siswa",
                "kelas" => $kelas,
            ]);
    }

    public function importDataSiswa(int $kelasId, Request $request):Response|RedirectResponse{

        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:xls,xlsx',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Pastikan Data Terisi dan Sesuai Format');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $this->siswaService->addFromExcel($kelasId, $request->file('file'));
            Alert::success('Sukses', 'Berhasil Menambah Data Siswa');
            return redirect()->route('detail-siswa', ['kelasId' => $kelasId]);
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menambah data siswa. Pastikan tidak ada data yang kosong. Pastikan email dan nis tidak sama masing-masing datanya');
            return redirect()->back();
        }
    }

    
}

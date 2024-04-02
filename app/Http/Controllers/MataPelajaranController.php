<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use App\Services\GuruService;
use App\Services\KelasService;
use App\Services\MataPelajaranService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class MataPelajaranController
{
    protected $mapelService;
    protected $kelasService;
    protected $guruService;

    public function __construct(MataPelajaranService $mapelService, KelasService $kelasService, GuruService $guruService)
    {
        $this->mapelService = $mapelService;
        $this->kelasService = $kelasService;
        $this->guruService = $guruService;
    }

    public function kelas():Response{

        $kelas = $this->kelasService->get();

        return response()
            ->view("back.admin.data.mapel.view-kelas", [
                "title" => "Data Mata Pelajaran Masing-Masing Kelas",
                "kelas" => $kelas
            ]);
    }

    public function mapel(int $kelasId):Response{

        $mapels = $this->mapelService->get($kelasId);
        $kelas = $this->kelasService->getId($kelasId);

        return response()
            ->view("back.admin.data.mapel.view-mapel", [
                "title" => "Data Mata Pelajaran",
                "mapels" => $mapels,
                "kelas" => $kelas
            ]);
    }

    public function addMapel(int $kelasId):Response{
        $gurus = $this->guruService->get();
        $kelas = $this->kelasService->getId($kelasId);
        return response()
            ->view("back.admin.data.mapel.add", [
                "title" => "Tambah Data Mata Pelajaran",
                "gurus" => $gurus,
                "kelas" => $kelas
            ]);
    }

    public function addDataMapel(Request $request, int $kelasId):Response|RedirectResponse{
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'guru_id' => 'required',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Pastikan Semua Data Terisi');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'nama' => $request->input('nama'),
            'guru_id' => $request->input('guru_id'),
            'kelas_id' => $kelasId
        ];

        try {
            $this->mapelService->add($data);
            Alert::success('Sukses', 'Berhasil Menambah Data Mata Pelajaran');
            return redirect()->route('detail-mapel', ['kelasId' => $kelasId]);
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menambah data mata pelajaran');
            return redirect()->back();
        }
    }

    public function editMapel( int $kelasId, $id):Response{
        $mapel = MataPelajaran::findOrFail($id);
        $gurus = $this->guruService->get();
        $kelas = $this->kelasService->getId($kelasId);
        return response()
            ->view("back.admin.data.mapel.edit", [
                "title" => "Edit Data Mata Pelajaran",
                "mapel" => $mapel,
                "kelas" => $kelas,
                "gurus" => $gurus,
            ]);
    }

    public function editDataMapel( int $kelasId, int $id,  Request $request): Response|RedirectResponse
    {
        if (($request->input('nama') == null)) {
            Alert::error('Gagal', 'Pastikan Data Nama Mata Pelajaran Tidak Kosong');
            return redirect()->back();
        }

        $data = [
            'nama' => $request->input('nama'),
            'guru_id' => $request->input('guru_id'),
            'kelas_id' =>$kelasId
        ];

        try {
            $this->mapelService->edit($id, $data);
            Alert::success('Sukses', 'Berhasil Mengubah Data Mata Pelajaran');
            return redirect()->route('detail-mapel', ['kelasId' => $kelasId]);
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat mengedit data mata pelajaran. Pastikan nama mata pelajaran tidak sama dengan data lainnya');
            return redirect()->back();
        }

    }

    public function deleteDataMapel($kelasId, $id): Response|RedirectResponse
    {
        $this->mapelService->delete($id);
        Alert::success('Sukses', 'Berhasil Menghapus Data Mata Pelajaran');
        return redirect()->route('detail-mapel', ['kelasId' => $kelasId]);
    }

    public function deleteAllDataMapel(int $kelasId): Response|RedirectResponse
    {
        $this->mapelService->deleteAll($kelasId);
        Alert::success('Sukses', 'Berhasil Menghapus Data Mata Pelajaran');
        return redirect()->route('detail-mapel', ['kelasId' => $kelasId]);
    }
}

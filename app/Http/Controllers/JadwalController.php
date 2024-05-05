<?php

namespace App\Http\Controllers;

use App\Services\MataPelajaranService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\RedirectResponse;
use App\Services\JadwalService;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\MataPelajaran;
use App\Models\Day;
use App\Models\Guru;

class JadwalController
{

    protected $jadwalService;

    protected $mapelServices;

    public function __construct(JadwalService $jadwalService, MataPelajaranService $mapelServices)
    {
        $this->jadwalService = $jadwalService;
        $this->mapelServices = $mapelServices;
    }
    public function jadwal():Response
    {
        $jadwals = $this->jadwalService->get();

        return response()
            ->view("back.admin.penjadwalan.view", [
                "title" => "Data Jadwal",
                "jadwals" => $jadwals
            ]);
    }

    public function addJadwal(): Response
    {
        $mapels = $this->mapelServices->getAll();
        $days = $this->jadwalService->getDay();

        return response()
            ->view("back.admin.penjadwalan.add", [
                "title" => "Add Data Jadwal",
                "mapels" => $mapels,
                "days" => $days,
            ]);
    }

    public function addDataJadwal(Request $request):Response | RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'mapel' => 'required',
            'day' => 'required',
            'start' => 'required',
            'end' => 'required',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Pastikan Semua Data Terisi');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'mapel' => $request->input('mapel'),
            'day' => $request->input('day'),
            'start' => $request->input('start'),
            'end' => $request->input('end'),
        ];

        if ($this->jadwalService->add($data) == false){
            Alert::error('Gagal', 'Pastikan jadwal tidak bertabrakan dengan jadwal lain');
            return redirect()->back();
        }else{
            Alert::success('Sukses', 'Berhasil Menambah Data Jadwal');

        }
        return redirect()->route('jadwal');
    }

    public function delete($id):Response | RedirectResponse
    {
        $this->jadwalService->delete($id);
        Alert::success('Sukses', 'Berhasil Menghapus Jadwal');
        return redirect()->route('jadwal');
    }

    public function deleteAllDataJadwal(): Response|RedirectResponse
    {
        $this->jadwalService->deleteAll();
        Alert::success('Sukses', 'Berhasil Menghapus Semua Data Jadwal');
        return redirect()->route('jadwal');
    }

}

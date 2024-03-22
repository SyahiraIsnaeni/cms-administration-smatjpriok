<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use App\Services\EkstrakurikulerService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class EkstrakurikulerController
{
    protected $ekstrakurikulerService;

    public function __construct(EkstrakurikulerService $ekstrakurikulerService)
    {
        $this->ekstrakurikulerService = $ekstrakurikulerService;
    }

    public function ekstrakurikuler():Response{

        $ekstrakurikulers = $this->ekstrakurikulerService->get();

        return response()
            ->view("back.admin.konten.beranda.ekstrakurikuler.view", [
                "title" => "Data Ektrakurikuler",
                "ekstrakurikulers" => $ekstrakurikulers
            ]);
    }

    public function addEkstrakurikuler():Response{
        return response()
            ->view("back.admin.konten.beranda.ekstrakurikuler.add", [
                "title" => "Tambah Data Ekstrakurikuler",
            ]);
    }

    public function addDataEkstrakurikuler(Request $request):Response|RedirectResponse{
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'logo' => 'required|image',
            'deskripsi' => 'required',
            'images.*' => 'required|image',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'nama' => $request->input('nama'),
            'logo' => $request->file('logo'),
            'deskripsi' => $request->input('deskripsi'),
            'images' => $request->file('images'),
        ];

        $this->ekstrakurikulerService->add($data);

        return redirect()->route('ekstrakurikuler');
    }

    public function editEkstrakurikuler($id):Response{
        $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);
        return response()
            ->view("back.admin.konten.beranda.ekstrakurikuler.edit", [
                "title" => "Edit Data Ekstrakurikuler",
                "ekstrakurikuler" => $ekstrakurikuler
            ]);
    }

    public function editDataEkstrakurikuler(int $id, Request $request): Response|RedirectResponse
    {
        $data = [
            'nama' => $request->input('nama'),
            'deskripsi' => $request->input('deskripsi'),
            'logo' => $request->file('logo'),
            'images' => $request->file('images')
        ];

        $this->ekstrakurikulerService->edit($id, $data);

        return redirect()->route('ekstrakurikuler');
    }
}

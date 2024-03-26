<?php

namespace App\Http\Controllers;

use App\Models\Welcome;
use App\Services\WelcomeService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class WelcomeController
{
    protected $welcomeService;

    public function __construct(WelcomeService $welcomeService)
    {
        $this->welcomeService = $welcomeService;
    }

    public function welcome():Response{

        $welcome = $this->welcomeService->get();

        return response()
            ->view("back.admin.konten.beranda.welcome-popup.view", [
                "title" => "Data Welcome Popup",
                "welcomes" => $welcome
            ]);
    }

    public function addWelcome():Response{
        return response()
            ->view("back.admin.konten.beranda.welcome-popup.add", [
                "title" => "Tambah Data Welcome Popup",
            ]);
    }

    public function addDataWelcome(Request $request):Response|RedirectResponse{

        if ($this->welcomeService->get()->count() > 0) {
            Alert::error('Gagal', 'Tidak dapat menambahkan data welcome popup lebih dari satu');
            return redirect()->route('welcome');
        }

        $validator = Validator::make($request->all(), [
            'gambar' => 'required|image|mimes:jpeg,jpg,png',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Pastikan Data Terisi dan Sesuai Ketentuan');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'gambar' => $request->file('gambar'),
        ];

        $this->welcomeService->add($data);

        Alert::success('Sukses', 'Berhasil Menambah Data Welcome Popup');

        return redirect()->route('welcome');
    }

    public function deleteDataWelcome($id): Response|RedirectResponse
    {
        $this->welcomeService->delete($id);
        Alert::success('Sukses', 'Berhasil Menghapus Data Welcome Popup');
        return redirect()->route('welcome');
    }
}

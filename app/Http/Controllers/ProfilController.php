<?php

namespace App\Http\Controllers;

use App\Services\FasilitasService;
use App\Services\StrukturOrganisasiService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProfilController
{
    protected $fasilitasService;
    protected $strukturOrganisasiService;

    public function __construct(
        FasilitasService $fasilitasService,
        StrukturOrganisasiService $strukturOrganisasiService,
    )
    {
        $this->fasilitasService = $fasilitasService;
        $this->strukturOrganisasiService = $strukturOrganisasiService;
    }

    public function index(): Response{
        $fasilitas = $this->fasilitasService->getAll();
        $strukturOrganisasis = $this->strukturOrganisasiService->get();

        return response()
            ->view("front.profil", [
                "fasilitas" => $fasilitas,
                "struktur" => $strukturOrganisasis,
            ]);
    }
}

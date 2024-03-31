<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FrontendEkstrakurikulerController
{
    public function detail($id):Response{
        $ekskul = Ekstrakurikuler::where('id', $id)->first();
        return response()
            ->view("front.detail-ekstrakurikuler", [
                "ekskul" => $ekskul,
            ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kunjungan;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PerpusController
{
    public function dashboard():Response{

        $kunjungan = Kunjungan::all();
        $peminjaman = Peminjaman::all();
        $buku = Buku::all();

        return response()
            ->view("back.perpustakaan.dashboard", compact('buku','peminjaman', 'kunjungan'));
    }
}

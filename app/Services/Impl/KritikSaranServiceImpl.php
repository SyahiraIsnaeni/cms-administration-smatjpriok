<?php

namespace App\Services\Impl;

use App\Models\KritikSaran;
use App\Services\KritikSaranService;
use Illuminate\Pagination\LengthAwarePaginator;

class KritikSaranServiceImpl implements KritikSaranService
{
    public function get(): LengthAwarePaginator
    {
        return KritikSaran::orderBy('created_at', 'desc')->paginate(10);
    }

    public function add(array $data): KritikSaran
    {
        $kritikSaran = new KritikSaran();
        $kritikSaran->nama = $data['nama'];
        $kritikSaran->email = $data['email'];
        $kritikSaran->isi = $data['isi'];

        $kritikSaran->save();

        return $kritikSaran;
    }

    public function delete(int $id): bool
    {
        $kritikSaran = KritikSaran::findOrFail($id);
        $kritikSaran->delete();

        return true;
    }

}

<?php

namespace App\Services\Impl;

use App\Models\Prestasi;
use App\Models\StrukturOrganisasi;
use App\Services\StrukturOrganisasiService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StrukturOrganisasiServiceImpl implements StrukturOrganisasiService
{
    public function get(): Collection
    {
        return StrukturOrganisasi::orderBy('created_at', 'desc')->get();
    }

    public function add(array $data): StrukturOrganisasi
    {
        $struktur = new StrukturOrganisasi();
        $struktur->kepsek = $data['kepsek'];
        $struktur->wakil_kurikulum = $data['wakil_kurikulum'];
        $struktur->wakil_kesiswaan = $data['wakil_kesiswaan'];
        $struktur->wakil_sarpras = $data['wakil_sarpras'];
        $struktur->bk = $data['bk'];
        $struktur->osis = $data['osis'];

        $struktur->save();

        return $struktur;
    }

    public function edit(int $id, array $data): StrukturOrganisasi
    {
        $struktur = StrukturOrganisasi::findOrFail($id);

        $struktur->kepsek = $data['kepsek'];
        $struktur->wakil_kurikulum = $data['wakil_kurikulum'];
        $struktur->wakil_kesiswaan = $data['wakil_kesiswaan'];
        $struktur->wakil_sarpras = $data['wakil_sarpras'];
        $struktur->bk = $data['bk'];
        $struktur->osis = $data['osis'];

        $struktur->save();

        return $struktur;
    }

    public function delete(int $id): bool
    {
        $struktur = StrukturOrganisasi::findOrFail($id);
        $struktur->delete();

        return true;
    }
}

<?php

namespace App\Services;

use App\Models\StrukturOrganisasi;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface StrukturOrganisasiService
{
    public function get():Collection;

    public function add(array $data): StrukturOrganisasi;

    public function edit(int $id, array $data): StrukturOrganisasi;

    public function delete(int $id):bool;
}

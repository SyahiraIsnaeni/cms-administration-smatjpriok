<?php

namespace App\Services;

use App\Models\Guru;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface GuruService
{
    public function get():LengthAwarePaginator;

    public function add(array $data): Guru;

    public function addFromExcel($file): void;

    public function edit(int $id, array $data): Guru;

    public function delete(int $id):bool;

    public function deleteAll():bool;
}

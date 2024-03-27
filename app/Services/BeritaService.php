<?php

namespace App\Services;

use App\Models\Berita;
use Illuminate\Pagination\LengthAwarePaginator;

interface BeritaService
{
    public function get():LengthAwarePaginator;

    public function getFewDataHp():LengthAwarePaginator;
    public function getFewDataDekstop():LengthAwarePaginator;

    public function getFirstData():?Berita;

    public function add(array $data): Berita;

    public function edit(int $id, array $data): Berita;

    public function softDelete(int $id):bool;

    public function hardDelete(int $id):bool;

    public function restore(int $id):bool;

    public function history():LengthAwarePaginator;
}

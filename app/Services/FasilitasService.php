<?php

namespace App\Services;

use App\Models\Fasilitas;
use Illuminate\Pagination\LengthAwarePaginator;
use Ramsey\Collection\Collection;

interface FasilitasService
{
    public function get():LengthAwarePaginator;

    public function getAll():Collection;

    public function add(array $data): Fasilitas;

    public function edit(int $id, array $data): Fasilitas;

    public function delete(int $id):bool;

}

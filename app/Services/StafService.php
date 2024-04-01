<?php

namespace App\Services;

use App\Models\Staf;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface StafService
{
    public function get():LengthAwarePaginator;


    public function add(array $data): Staf;

    public function edit(int $id, array $data): Staf;

    public function delete(int $id):bool;
}

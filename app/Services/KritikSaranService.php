<?php

namespace App\Services;

use App\Models\KritikSaran;
use Illuminate\Pagination\LengthAwarePaginator;
use Ramsey\Collection\Collection;

interface KritikSaranService
{
    public function get():LengthAwarePaginator;

    public function add(array $data): KritikSaran;

    public function delete(int $id):bool;

}

<?php

namespace App\Services;

use App\Models\Ekstrakurikuler;
use Illuminate\Database\Eloquent\Collection;

interface EkstrakurikulerService
{
    public function get():Collection;
    public function add(array $data): Ekstrakurikuler;

    public function edit(int $id, array $data): Ekstrakurikuler;

    public function delete(int $id):bool;
}

<?php

namespace App\Services;

use App\Models\Ekstrakurikuler;

interface EkstrakurikulerService
{
    public function add(array $data): Ekstrakurikuler;

    public function edit(int $id, array $data): Ekstrakurikuler;

    public function delete(int $id):bool;
}

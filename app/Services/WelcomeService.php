<?php

namespace App\Services;

use App\Models\Welcome;
use Illuminate\Database\Eloquent\Collection;

interface WelcomeService
{
    public function get():Collection;

    public function add(array $data): Welcome;

    public function delete(int $id):bool;
}

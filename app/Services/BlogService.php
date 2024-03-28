<?php

namespace App\Services;

use App\Models\Berita;
use App\Models\Blog;
use Illuminate\Pagination\LengthAwarePaginator;
use Ramsey\Collection\Collection;

interface BlogService
{
    public function get():LengthAwarePaginator;

    public function getAll():LengthAwarePaginator;

    public function add(array $data): Blog;

    public function edit(int $id, array $data): Blog;

    public function softDelete(int $id):bool;

    public function hardDelete(int $id):bool;
}

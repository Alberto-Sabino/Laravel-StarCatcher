<?php

namespace App\Repositories\Contracts;

use App\Http\Requests\PaginateAndFilterRequest;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{
    public function getById(int $id): Model;

    public function list(PaginateAndFilterRequest $request): LengthAwarePaginator;

    public function create(array $data): Model;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;
}

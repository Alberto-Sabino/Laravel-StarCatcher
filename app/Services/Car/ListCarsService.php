<?php

namespace App\Services\Car;

use App\Http\Requests\PaginateAndFilterRequest;
use App\Repositories\Contracts\CarRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ListCarsService
{
    public function __construct(
        protected CarRepositoryInterface $repository
    ) {}

    public function list(PaginateAndFilterRequest $request): LengthAwarePaginator
    {
        return $this->repository
            ->list($request);
    }
}

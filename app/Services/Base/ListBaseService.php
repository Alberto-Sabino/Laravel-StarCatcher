<?php

namespace App\Services\Base;

use App\Http\Requests\PaginateAndFilterRequest;
use App\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ListBaseService
{
    public function __construct(
        protected BaseRepositoryInterface $repository
    ) {}

    
    /**
     * List items with pagination and filters
     *
     * @param PaginateAndFilterRequest $request
     *
     * @return LengthAwarePaginator
     */
    public function list(PaginateAndFilterRequest $request): LengthAwarePaginator
    {
        return $this->repository
            ->list($request);
    }
}

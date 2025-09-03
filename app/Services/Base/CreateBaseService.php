<?php

namespace App\Services\Base;

use App\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class CreateBaseService
{
    public function __construct(
        protected BaseRepositoryInterface $repository
    ) {}

    /**
     * Create and store a new resource
     * 
     * @param array $data
     * 
     * @return Model
     */
    public function create(array $data): Model
    {
        return $this->repository
            ->create($data);
    }
}

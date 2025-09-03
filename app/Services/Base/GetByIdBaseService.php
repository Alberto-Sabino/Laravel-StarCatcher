<?php

namespace App\Services\Base;

use App\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class GetByIdBaseService
{
    public function __construct(
        protected BaseRepositoryInterface $repository
    ) {}

    /**
     * Retrieves a model by its id.
     *
     * @param int $id
     *
     * @return Model
     * 
     * @throws TreatedException if $id not exists
     */
    public function getById(int $id): Model
    {
        return $this->repository
            ->getById($id);
    }
}

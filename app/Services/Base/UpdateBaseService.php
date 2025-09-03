<?php

namespace App\Services\Base;

use App\Repositories\Contracts\BaseRepositoryInterface;

class UpdateBaseService
{
    public function __construct(
        protected BaseRepositoryInterface $repository
    ) {}

    /**
     * Updates a model by its id.
     *
     * @param int $id
     * @param array $data
     *
     * @return bool
     * 
     * @throws TreatedException if $id not exists
     */
    public function update(int $id, array $data): bool
    {
        return $this->repository
            ->update($id, $data);
    }
}

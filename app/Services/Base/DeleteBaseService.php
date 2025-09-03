<?php

namespace App\Services\Base;

use App\Repositories\Contracts\BaseRepositoryInterface;

class DeleteBaseService
{
    public function __construct(
        protected BaseRepositoryInterface $repository
    ) {}


    /**
     * Deletes a model by its id.
     *
     * @param int $id
     *
     * @return bool
     *
     * @throws TreatedException if $id not exists
     */
    public function delete(int $id): bool
    {
        return $this->repository
            ->delete($id);
    }
}

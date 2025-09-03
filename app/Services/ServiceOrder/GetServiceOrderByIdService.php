<?php

namespace App\Services\ServiceOrder;

use App\Models\ServiceOrder;
use App\Repositories\Contracts\ServiceOrderRepositoryInterface;

class GetServiceOrderByIdService
{
    public function __construct(
        protected ServiceOrderRepositoryInterface $repository
    ) {}

    public function getById(int $id): ServiceOrder
    {
        return $this->repository
            ->getByIdWithCarAndParts($id);
    }
}

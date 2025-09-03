<?php

namespace App\Services\Car;

use App\Models\Car;
use App\Repositories\Contracts\CarRepositoryInterface;

class GetCarByIdService
{
    public function __construct(
        protected CarRepositoryInterface $repository
    ) {}

    public function getById(int $id): Car
    {
        return $this->repository
            ->getById($id);
    }
}

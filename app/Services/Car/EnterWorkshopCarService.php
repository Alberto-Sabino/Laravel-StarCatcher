<?php

namespace App\Services\Car;

use App\Repositories\Contracts\CarRepositoryInterface;

class EnterWorkshopCarService
{
    public function __construct(
        protected CarRepositoryInterface $repository
    ) {}

    public function enterWorkshop(int $id): bool
    {
        return $this->repository
            ->update($id, [
                'in_workshop' => true
            ]);
    }
}

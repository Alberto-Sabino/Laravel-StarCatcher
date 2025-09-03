<?php

namespace App\Services\Car;

use App\Repositories\Contracts\CarRepositoryInterface;

class ExitWorkshopCarService
{
    public function __construct(
        protected CarRepositoryInterface $repository
    ) {}

    public function exitWorkshop(int $id): bool
    {
        return $this->repository
            ->update($id, [
                'in_workshop' => false
            ]);
    }
}

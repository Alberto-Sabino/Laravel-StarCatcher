<?php

namespace App\Services\Car;

use App\Repositories\Contracts\CarRepositoryInterface;

class UpdateCarService
{
    public function __construct(
        protected CarRepositoryInterface $repository
    ) {}

    public function update(int $id, array $data): bool
    {
        return $this->repository
            ->update($id, $data);
    }
}

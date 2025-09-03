<?php

namespace App\Repositories\Contracts;

use App\Models\ServiceOrder;

interface ServiceOrderRepositoryInterface extends BaseRepositoryInterface
{
    public function getByIdWithCarAndParts(int $id): ServiceOrder;

    public function attachParts(int $serviceOrderId, array $parts): bool;

    public function getSummary(): array;
}

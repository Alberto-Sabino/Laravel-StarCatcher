<?php

namespace App\Services\ServiceOrder;

use App\Repositories\Contracts\ServiceOrderRepositoryInterface;

class OpenServiceOrderService extends UpdateServiceOrderService
{
    public function __construct(
        ServiceOrderRepositoryInterface $repository
    ) {
        parent::__construct($repository);
    }

    public function openServiceOrder(int $id): bool
    {
        return parent::update($id, ['is_open' => true]);
    }
}

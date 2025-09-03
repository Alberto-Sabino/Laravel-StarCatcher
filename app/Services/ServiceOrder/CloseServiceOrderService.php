<?php

namespace App\Services\ServiceOrder;

use App\Repositories\Contracts\ServiceOrderRepositoryInterface;
use App\Services\Base\UpdateBaseService;

class CloseServiceOrderService extends UpdateBaseService
{
    public function __construct(
        ServiceOrderRepositoryInterface $repository
    ) {
        parent::__construct($repository);
    }

    public function closeServiceOrder(int $id): bool
    {
        return parent::update($id, ['is_open' => false]);
    }
}

<?php

namespace App\Services\ServiceOrder;

use App\Repositories\Contracts\ServiceOrderRepositoryInterface;
use App\Services\Base\UpdateBaseService;

class UpdateServiceOrderService extends UpdateBaseService
{
    public function __construct(
        ServiceOrderRepositoryInterface $repository
    ) {
        parent::__construct($repository);
    }
}

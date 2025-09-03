<?php

namespace App\Services\ServiceOrder;

use App\Repositories\Contracts\ServiceOrderRepositoryInterface;
use App\Services\Base\CreateBaseService;

class CreateServiceOrderService extends CreateBaseService
{
    public function __construct(
        ServiceOrderRepositoryInterface $repository
    ) {
        parent::__construct($repository);
    }
}

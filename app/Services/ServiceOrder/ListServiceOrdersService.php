<?php

namespace App\Services\ServiceOrder;

use App\Repositories\Contracts\ServiceOrderRepositoryInterface;
use App\Services\Base\ListBaseService;

class ListServiceOrdersService extends ListBaseService
{
    public function __construct(
        ServiceOrderRepositoryInterface $repository
    ) {
        parent::__construct($repository);
    }
}

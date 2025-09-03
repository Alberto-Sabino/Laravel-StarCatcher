<?php

namespace App\Services\Car;

use App\Models\Car;
use App\Repositories\Contracts\CarRepositoryInterface;
use App\Services\Base\CreateBaseService;

class CreateCarService extends CreateBaseService
{
    public function __construct(
        CarRepositoryInterface $repository
    ) {
        parent::__construct($repository);
    }
}

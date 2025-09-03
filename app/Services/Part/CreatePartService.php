<?php

namespace App\Services\Part;

use App\Repositories\Contracts\PartRepositoryInterface;
use App\Services\Base\CreateBaseService;

class CreatePartService extends CreateBaseService
{
    public function __construct(
        PartRepositoryInterface $repository
    ) {
        parent::__construct($repository);
    }
}

<?php

namespace App\Services\Part;

use App\Repositories\Contracts\PartRepositoryInterface;
use App\Services\Base\GetByIdBaseService;

class GetPartByIdService extends GetByIdBaseService
{
    public function __construct(
        PartRepositoryInterface $repository
    ) {
        parent::__construct($repository);
    }
}

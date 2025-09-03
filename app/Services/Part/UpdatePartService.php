<?php

namespace App\Services\Part;

use App\Repositories\Contracts\PartRepositoryInterface;
use App\Services\Base\UpdateBaseService;

class UpdatePartService extends UpdateBaseService
{
    public function __construct(
        PartRepositoryInterface $repository
    ) {
        parent::__construct($repository);
    }
}

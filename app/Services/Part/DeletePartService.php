<?php

namespace App\Services\Part;

use App\Repositories\Contracts\PartRepositoryInterface;
use App\Services\Base\DeleteBaseService;

class DeletePartService extends DeleteBaseService
{
    public function __construct(
        PartRepositoryInterface $repository
    ) {
        parent::__construct($repository);
    }
}

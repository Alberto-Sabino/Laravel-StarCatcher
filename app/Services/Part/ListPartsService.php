<?php

namespace App\Services\Part;

use App\Repositories\Contracts\PartRepositoryInterface;
use App\Services\Base\ListBaseService;

class ListPartsService extends ListBaseService
{
    public function __construct(
        PartRepositoryInterface $repository
    ) {
        parent::__construct($repository);
    }
}

<?php

namespace App\Services\User;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Services\Base\GetByIdBaseService;

class GetUserByIdService extends GetByIdBaseService
{
    public function __construct(
        UserRepositoryInterface $repository
    ) {
        parent::__construct($repository);
    }
}

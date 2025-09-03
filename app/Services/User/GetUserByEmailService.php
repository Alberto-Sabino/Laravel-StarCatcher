<?php

namespace App\Services\User;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;

class GetUserByEmailService
{
    public function __construct(
        protected UserRepositoryInterface $repository
    ) {}

    public function getByEmail(string $email): ?User
    {
        return $this->repository
            ->getByEmail($email);
    }
}

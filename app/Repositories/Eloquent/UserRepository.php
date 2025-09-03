<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    private const MODEL_NAME = 'usuário';

    public function __construct(
        User $model
    ) {
        parent::__construct($model, self::MODEL_NAME);
    }

    public function getByEmail(string $email): User|string
    {
        return $this->model
            ->where('email', $email)
            ->first();
    }
}

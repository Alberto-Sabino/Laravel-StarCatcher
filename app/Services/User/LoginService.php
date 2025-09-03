<?php

namespace App\Services\User;

use App\Exceptions\TreatedException;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginService
{
    public function __construct(
        protected GetUserByEmailService $getUserByEmailService
    ) {}

    /**
     * Authenticate a user and persist his token in Cache.
     *
     * @param array $data must have keys 'email' and 'password'.
     *
     * @throws TreatedException if user not exists or password invalid.
     *
     * @return User the logged user and his accessToken.
     */
    public function login(array $data): User
    {
        $user = $this->getUser($data['email']);

        $this->validateCredentials($user, $data['password']);
        $this->generateAndSetToken($user);

        return $user;
    }

    private function getUser(string $email): User
    {
        $user = $this->getUserByEmailService
            ->getByEmail($email);

        if (! $user) {
            $this->throwInvalidCredentialsException();
        }

        return $user;
    }

    private function validateCredentials(User $user, string $password): void
    {
        if (! Hash::check($password, $user->password)) {
            $this->throwInvalidCredentialsException();
        }
    }

    private function generateAndSetToken(User $user): void
    {
        $uniqueToken = uniqid($user->id, true);
        $user->accessToken = $uniqueToken;

        Cache::add($uniqueToken, $user, now()->addHours(10));
    }

    private function throwInvalidCredentialsException(): void
    {
        throw new TreatedException('Credenciais inválidas!', 400);
    }
}

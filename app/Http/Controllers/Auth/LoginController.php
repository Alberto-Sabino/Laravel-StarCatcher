<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\User\LoginService;
use Illuminate\Support\Facades\Response;

class LoginController extends Controller
{
    public function __construct(
        protected LoginService $loginService
    ) {}

    public function login(LoginRequest $request): \Illuminate\Http\JsonResponse
    {
        $user = $this->loginService
            ->login($request->all());

        return Response::json($user);
    }
}

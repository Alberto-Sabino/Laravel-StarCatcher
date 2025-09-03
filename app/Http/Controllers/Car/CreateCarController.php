<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Http\Requests\Car\CreateCarRequest;
use App\Services\Car\CreateCarService;
use Illuminate\Support\Facades\Response;

class CreateCarController extends Controller
{
    public function __construct(
        protected CreateCarService $createCarService
    ) {}


    public function create(CreateCarRequest $request): \Illuminate\Http\JsonResponse
    {
        $car = $this->createCarService
            ->create($request->all());

        return Response::json([
            'message' => 'Veículo cadastrado com sucesso!',
            'created' => $car
        ], 201);
    }
}

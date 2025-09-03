<?php

namespace App\Http\Controllers\ServiceOrder;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceOrder\CreateServiceOrderRequest;
use App\Services\ServiceOrder\CreateServiceOrderService;
use Illuminate\Support\Facades\Response;

class CreateServiceOrderController extends Controller
{
    public function __construct(
        protected CreateServiceOrderService $createServiceOrderService
    ) {}

    public function create(CreateServiceOrderRequest $request): \Illuminate\Http\JsonResponse
    {
        $serviceOrder = $this->createServiceOrderService
            ->create($request->all());

        return Response::json([
            'message' => 'Serviço criado com sucesso!',
            'created' => $serviceOrder
        ], 201);
    }
}

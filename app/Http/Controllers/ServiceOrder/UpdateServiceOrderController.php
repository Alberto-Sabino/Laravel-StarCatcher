<?php

namespace App\Http\Controllers\ServiceOrder;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceOrder\UpdateServiceOrderRequest;
use App\Services\ServiceOrder\UpdateServiceOrderService;
use Illuminate\Support\Facades\Response;

class UpdateServiceOrderController extends Controller
{
    public function __construct(
        protected UpdateServiceOrderService $updateServiceOrderService
    ) {}

    public function update(int $id, UpdateServiceOrderRequest $request): \Illuminate\Http\JsonResponse
    {
        $success = $this->updateServiceOrderService
            ->update($id, $request->all());

        return Response::json([
            'message' => $success ? 'Serviço atualizado com sucesso!'
                : 'Não foi possível atualizar o serviço!'
        ], $success ? 200 : 400);
    }
}

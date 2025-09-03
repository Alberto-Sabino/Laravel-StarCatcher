<?php

namespace App\Http\Controllers\ServiceOrder;

use App\Http\Controllers\Controller;
use App\Services\ServiceOrder\CloseServiceOrderService;
use Illuminate\Support\Facades\Response;

class CloseServiceOrderController extends Controller
{
    public function __construct(
        protected CloseServiceOrderService $closeServiceOrderService
    ) {}

    public function close(int $id): \Illuminate\Http\JsonResponse
    {
        $success = $this->closeServiceOrderService
            ->closeServiceOrder($id);

        return Response::json([
            'message' => $success ? 'Serviço finalizado com sucesso!'
                : 'Não foi possível finalizar o serviço!'
        ], $success ? 200 : 400);
    }
}

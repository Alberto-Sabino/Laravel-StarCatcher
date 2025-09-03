<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Services\Car\ExitWorkshopCarService;
use Illuminate\Http\Client\Response;

class ExitWorkshopCarController extends Controller
{
    public function __construct(
        protected ExitWorkshopCarService $exitWorkshopCarService
    ) {}

    public function exit(int $id): \Illuminate\Http\JsonResponse
    {
        $success = $this->exitWorkshopCarService
            ->exitWorkshop($id);

        return Response::json([
            'message' => $success ? 'Veículo removido da oficina atual!'
                : 'Não foi possível remover o veículo da oficina atual!'
        ], $success ? 200 : 400);
    }
}

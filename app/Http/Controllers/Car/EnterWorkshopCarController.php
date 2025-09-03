<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Services\Car\EnterWorkshopCarService;
use Illuminate\Support\Facades\Response;

class EnterWorkshopCarController extends Controller
{
    public function __construct(
        protected EnterWorkshopCarService $enterWorkshopCarService
    ) {}

    public function enter(int $id): \Illuminate\Http\JsonResponse
    {
        $success = $this->enterWorkshopCarService
            ->enterWorkshop($id);

        return Response::json([
            'message' => $success ? 'Veículo registrado na oficina atual!'
                : 'Não foi possível registrar o veículo na oficina atual!'
        ], $success ? 200 : 400);
    }
}

<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Http\Requests\Car\UpdateCarRequest;
use App\Services\Car\UpdateCarService;
use Illuminate\Support\Facades\Response;

class UpdateCarController extends Controller
{
    public function __construct(
        protected UpdateCarService $updateCarService
    ) {}

    public function update(int $id, UpdateCarRequest $request): \Illuminate\Http\JsonResponse
    {
        $success = $this->updateCarService
            ->update($id, $request->all());

        return Response::json([
            'message' => $success ? 'Veículo atualizado com sucesso!'
                : 'Nao foi possivel atualizar o veiculo!'
        ], $success ? 200 : 400);
    }
}

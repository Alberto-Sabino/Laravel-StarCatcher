<?php

namespace App\Http\Controllers\Part;

use App\Http\Controllers\Controller;
use App\Services\Part\DeletePartService;
use Illuminate\Support\Facades\Response;

class DeletePartController extends Controller
{
    public function __construct(
        protected DeletePartService $deletePartService
    ) {}

    public function delete(int $id): \Illuminate\Http\JsonResponse
    {
        $success = $this->deletePartService
            ->delete($id);

        return Response::json([
            'message' => $success ? 'Peça removida do catálogo com sucesso!'
                : 'Não foi possível remover a peça do catálogo!',
        ], $success ? 200 : 400);
    }
}

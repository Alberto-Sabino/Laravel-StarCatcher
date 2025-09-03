<?php

namespace App\Http\Controllers\Part;

use App\Http\Controllers\Controller;
use App\Http\Requests\Part\CreatePartRequest;
use App\Services\Part\CreatePartService;
use Illuminate\Support\Facades\Response;

class CreatePartController extends Controller
{
    public function __construct(
        protected CreatePartService $createPartService
    ) {}

    public function create(CreatePartRequest $request): \Illuminate\Http\JsonResponse
    {
        $part = $this->createPartService
            ->create($request->all());

        return Response::json([
            'message' => 'Peça adicionada ao catálogo com sucesso!',
            'created' => $part
        ]);
    }
}

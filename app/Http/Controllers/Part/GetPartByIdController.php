<?php

namespace App\Http\Controllers\Part;

use App\Http\Controllers\Controller;
use App\Services\Part\GetPartByIdService;
use Illuminate\Support\Facades\Response;

class GetPartByIdController extends Controller
{
    public function __construct(
        protected GetPartByIdService $getPartByIdService
    ) {}

    public function get(int $id): \Illuminate\Http\JsonResponse
    {
        $part = $this->getPartByIdService
            ->getById($id);

        return Response::json($part);
    }
}

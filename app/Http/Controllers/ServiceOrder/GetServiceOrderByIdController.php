<?php

namespace App\Http\Controllers\ServiceOrder;

use App\Http\Controllers\Controller;
use App\Services\ServiceOrder\GetServiceOrderByIdService;
use Illuminate\Support\Facades\Response;

class GetServiceOrderByIdController extends Controller
{
    public function __construct(
        protected GetServiceOrderByIdService $getServiceOrderByIdService
    ) {}

    public function get(int $id): \Illuminate\Http\JsonResponse
    {
        $serviceOrder = $this->getServiceOrderByIdService
            ->getById($id);

        return Response::json($serviceOrder);
    }
}

<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Services\Car\GetCarByIdService;
use Illuminate\Support\Facades\Response;

class GetCarByIdController extends Controller
{
    public function __construct(
        protected GetCarByIdService $getCarByIdService
    ) {}

    public function get(int $id): \Illuminate\Http\JsonResponse
    {
        $car = $this->getCarByIdService
            ->getById($id);

        return Response::json($car);
    }
}

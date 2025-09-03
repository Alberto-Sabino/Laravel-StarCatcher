<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaginateAndFilterRequest;
use App\Services\Car\ListCarsService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ListCarsController extends Controller
{
    public function __construct(
        protected ListCarsService $listCarsService
    ) {}

    public function list(PaginateAndFilterRequest $request): LengthAwarePaginator
    {
        return $this->listCarsService
            ->list($request);
    }
}

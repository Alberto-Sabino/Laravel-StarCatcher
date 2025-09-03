<?php

namespace App\Http\Controllers\ServiceOrder;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaginateAndFilterRequest;
use App\Services\ServiceOrder\ListServiceOrdersService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ListServiceOrdersController extends Controller
{
    public function __construct(
        protected ListServiceOrdersService $listServiceOrdersService
    ) {}

    public function list(PaginateAndFilterRequest $request): LengthAwarePaginator
    {
        return $this->listServiceOrdersService
            ->list($request);
    }
}

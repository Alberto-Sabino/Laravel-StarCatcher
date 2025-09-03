<?php

namespace App\Http\Controllers\Part;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaginateAndFilterRequest;
use App\Services\Part\ListPartsService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ListPartsController extends Controller
{
    public function __construct(
        protected ListPartsService $listPartsService
    ) {}

    public function list(PaginateAndFilterRequest $request): LengthAwarePaginator
    {
        return $this->listPartsService
            ->list($request);
    }
}

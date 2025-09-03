<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Services\Report\GetServiceOrderReportByIdService;
use Illuminate\Support\Facades\Response;

class GetServiceOrderReportController extends Controller
{
    public function __construct(
        protected GetServiceOrderReportByIdService $getServiceOrderReportByIdService
    ) {}

    public function get(int $id): string
    {
        return $this->getServiceOrderReportByIdService
            ->getReport($id);
    }
}

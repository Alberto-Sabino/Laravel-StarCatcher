<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Services\Report\GetSummaryReportService;
use Illuminate\Support\Facades\Response;

class GetSummaryReportController extends Controller
{
    public function __construct(
        protected GetSummaryReportService $getSummaryReportService
    ) {}

    public function get(): string
    {
        return $this->getSummaryReportService
            ->getReport();
    }
}

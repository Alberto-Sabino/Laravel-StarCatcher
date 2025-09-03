<?php

namespace App\Services\Report;

use App\Services\ServiceOrder\GetSummaryReportDataService;
use Illuminate\Support\Facades\View;

class GetSummaryReportService
{
    public function __construct(
        protected GetSummaryReportDataService $getSummaryReportDataService
    ) {}

    public function getReport(): string
    {
        $summary = $this->getSummaryReportDataService
            ->get();

        return $this->generateReportBase64($summary);
    }

    private function generateReportBase64(array $summary): string
    {

        /**
         * Se quiser ver o html no postman, descomente esse return e comente o outro.
         * O outro transforma o template em base64, pra baixar no front.
         */

        //  return View::make('reports.summary', [
        //     'summary' => $summary
        // ])->render();

        $template = View::make('reports.summary', [
            'summary' => $summary
        ])->render();

        return base64_encode($template);
    }
}

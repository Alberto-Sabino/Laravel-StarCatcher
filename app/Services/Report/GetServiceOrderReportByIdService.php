<?php

namespace App\Services\Report;

use App\Models\ServiceOrder;
use App\Services\ServiceOrder\GetServiceOrderByIdService;
use Illuminate\Support\Facades\View;

class GetServiceOrderReportByIdService
{
    public function __construct(
        protected GetServiceOrderByIdService $getServiceOrderByIdService
    ) {}

    public function getReport(int $id): string
    {
        $serviceOrder = $this->getServiceOrderByIdService
            ->getById($id);

        return $this->generateReportBase64($serviceOrder);
    }

    private function generateReportBase64(ServiceOrder $serviceOrder): string
    {
        /**
         * Se quiser ver o html no postman, descomente esse return e comente o outro.
         * O outro transforma o template em base64, pra baixar no front.
         */

        //  return View::make('reports.service-order', [
        //     'serviceOrder' => $serviceOrder
        // ])->render();

        $template = View::make('reports.service-order', [
            'serviceOrder' => $serviceOrder
        ])->render();

        return base64_encode($template);
    }
}

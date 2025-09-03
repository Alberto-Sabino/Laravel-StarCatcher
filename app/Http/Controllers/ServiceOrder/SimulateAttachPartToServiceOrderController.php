<?php

namespace App\Http\Controllers\ServiceOrder;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceOrder\AttachPartsServiceOrderRequest;
use App\Services\ServiceOrder\SimulateAttachPartToServiceOrderService;
use Illuminate\Support\Facades\Response;

class SimulateAttachPartToServiceOrderController extends Controller
{
    public function __construct(
        protected SimulateAttachPartToServiceOrderService $simulateAttachPartToServiceOrderService
    ) {}

    public function simulate(int $id, AttachPartsServiceOrderRequest $request): \Illuminate\Http\JsonResponse
    {
        $simulation = $this->simulateAttachPartToServiceOrderService
            ->simulate($id, $request->get('parts'));

        return Response::json($simulation);
    }
}

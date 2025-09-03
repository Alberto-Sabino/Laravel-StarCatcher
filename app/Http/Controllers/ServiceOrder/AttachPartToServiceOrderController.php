<?php

namespace App\Http\Controllers\ServiceOrder;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceOrder\AttachPartsServiceOrderRequest;
use App\Services\ServiceOrder\AttachPartToOrderServiceService;
use Illuminate\Support\Facades\Response;

class AttachPartToServiceOrderController extends Controller
{
    public function __construct(
        protected AttachPartToOrderServiceService $attachPartToOrderServiceService
    ) {}

    public function attach(int $id, AttachPartsServiceOrderRequest $request): \Illuminate\Http\JsonResponse
    {
        $success = $this->attachPartToOrderServiceService
            ->attachParts($id, $request->get('parts'));

        return Response::json([
            'message' => $success ? 'Peças adicionadas ao serviço com sucesso!'
                : 'Não foi possível adicionar as peças ao serviço!'
        ], $success ? 200 : 400);
    }
}

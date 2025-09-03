<?php

namespace App\Services\ServiceOrder;

use App\Exceptions\TreatedException;
use App\Models\ServiceOrder;
use App\Repositories\Contracts\ServiceOrderRepositoryInterface;
use Illuminate\Support\Facades\DB;

class AttachPartToOrderServiceService
{
    public function __construct(
        protected ServiceOrderRepositoryInterface $repository,
        protected GetServiceOrderByIdService $getServiceOrderByIdService
    ) {}

    public function attachParts(int $serviceOrderId, array $parts): bool
    {
        $serviceOrder = $this->validateServiceOrder($serviceOrderId);
        $normalizedParts = $this->normalizeParts($parts);

        try {
            DB::beginTransaction();
            $success = $this->attachPartsToServiceOrder($serviceOrderId, $normalizedParts);

            if ($success) {
                $this->calculateServiceOrderTotalValue($serviceOrder);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        return $success;
    }

    private function validateServiceOrder(int $serviceOrderId): ServiceOrder
    {
        $serviceOrder = $this->getServiceOrderByIdService
            ->getById($serviceOrderId);

        if (! $serviceOrder->is_open) {
            throw new TreatedException('Não é possível adicionar peças à serviços finalizados!', 400);
        }

        return $serviceOrder;
    }

    private function normalizeParts(array $parts): array
    {
        $normalizedParts = [];
        foreach ($parts as &$part) {
            $normalizedParts[$part['id']] = ['quantity' => $part['quantity']];
        }

        return $normalizedParts;
    }

    private function attachPartsToServiceOrder(int $serviceOrderId, array $parts): bool
    {
        return $this->repository
            ->attachParts($serviceOrderId, $parts);
    }

    private function calculateServiceOrderTotalValue(ServiceOrder $serviceOrder): void
    {
        $serviceOrder->calculateTotalValue();
    }
}

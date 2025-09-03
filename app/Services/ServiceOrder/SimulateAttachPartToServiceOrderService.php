<?php

namespace App\Services\ServiceOrder;

use App\Exceptions\TreatedException;
use App\Models\ServiceOrder;
use App\Services\Part\GetPartByIdService;

class SimulateAttachPartToServiceOrderService
{
    public function __construct(
        protected GetServiceOrderByIdService $getServiceOrderByIdService,
        protected GetPartByIdService $getPartByIdService
    ) {}

    /**
     * Simulates the pricing of attaching parts to a service order.
     *
     * @param int $serviceOrderId
     * @param array $parts
     * @return array
     * @throws \Exception
     */
    public function simulate(int $serviceOrderId, array $parts): array
    {
        $serviceOrder = $this->getAndValidateServiceOrder($serviceOrderId);

        $simulation = $this->simulateAttachments($serviceOrder, $parts);
        return $this->mapSimulationResult($serviceOrder, $simulation);
    }

    private function getAndValidateServiceOrder(int $serviceOrderId): ServiceOrder
    {
        $serviceOrder = $this->getServiceOrderByIdService
            ->getById($serviceOrderId);

        if (!$serviceOrder->is_open) {
            throw new TreatedException('Não é possível simular alterações em uma ordem de serviço fechada.', 400);
        }

        return $serviceOrder;
    }

    private function simulateAttachments(ServiceOrder $serviceOrder, array $parts): array
    {
        // current order
        $simulatedTotalValue = $serviceOrder->calculateTotalValue();
        $existingParts = $serviceOrder->parts->keyBy('id');

        // simulation
        $simulatedParts = [];

        foreach ($parts as $part) {
            $partModel = $this->getPartByIdService
                ->getById($part['id']);

            $additionalQuantity = $part['quantity'];
            $additionalCost = $additionalQuantity * $partModel->price;

            $simulatedTotalValue += $additionalCost;

            $simulatedParts[] = [
                'id' => $partModel->id,
                'name' => $partModel->name,
                'brand' => $partModel->brand,
                'price' => $partModel->price,
                'quantity_already_in_order' => $existingParts[$partModel->id]->pivot->quantity ?? 0,
                'quantity_to_add' => $additionalQuantity,
                'total_cost' => $additionalCost
            ];
        }

        return [
            'simulated_total_value' => (float) number_format($simulatedTotalValue, 2, '.', ','),
            'simulated_parts' => $simulatedParts
        ];
    }

    private function mapSimulationResult(ServiceOrder $serviceOrder, array $simulation): array
    {
        return [
            'order_id' => $serviceOrder->id,
            'current_total_value' => $serviceOrder->total_value,
            'simulated_total_value' => $simulation['simulated_total_value'],
            'simulated_parts' => $simulation['simulated_parts']
        ];
    }
}

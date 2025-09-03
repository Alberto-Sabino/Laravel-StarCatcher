<?php

namespace App\Repositories\Eloquent;

use App\Exceptions\TreatedException;
use App\Models\ServiceOrder;
use App\Repositories\Contracts\ServiceOrderRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ServiceOrderRepository extends BaseRepository implements ServiceOrderRepositoryInterface
{
    private const MODEL_NAME = 'ordem de serviço';

    public function __construct(
        ServiceOrder $model
    ) {
        parent::__construct($model, self::MODEL_NAME);
    }

    public function getByIdWithCarAndParts(int $id): ServiceOrder
    {
        $serviceOrder = $this->model
            ->with('car', 'parts')
            ->find($id);

        if (!$serviceOrder || ! $serviceOrder->exists()) {
            throw new TreatedException(
                'Não encontramos registro de' . self::MODEL_NAME . 'para o identificador informado',
                404
            );
        }

        return $serviceOrder;
    }

    public function attachParts(int $serviceOrderId, array $parts): bool
    {
        try {
            $this->model
                ->find($serviceOrderId)
                ->parts()
                ->syncWithoutDetaching($parts);

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getSummary(): array
    {
        $carCount = DB::table('service_orders')
            ->distinct('car_id')
            ->count('car_id');

        $totalParts = DB::table('order_parts')
            ->sum('quantity');

        $totalRevenue = DB::table('service_orders')
            ->sum('total_value');

        return [
            'total_cars' => $carCount,
            'total_parts' => $totalParts,
            'total_revenue' => $totalRevenue,
        ];
    }
}

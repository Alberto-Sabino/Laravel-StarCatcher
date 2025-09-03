<?php

namespace App\Repositories\Eloquent;

use App\Models\Car;
use App\Repositories\Contracts\CarRepositoryInterface;

class CarRepository extends BaseRepository implements CarRepositoryInterface
{
    private const MODEL_NAME = 'veículo';

    public function __construct(
        Car $model
    ) {
        parent::__construct($model, self::MODEL_NAME);
    }
}

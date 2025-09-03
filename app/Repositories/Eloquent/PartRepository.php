<?php

namespace App\Repositories\Eloquent;

use App\Models\Part;
use App\Repositories\Contracts\PartRepositoryInterface;

class PartRepository extends BaseRepository implements PartRepositoryInterface
{
    private const MODEL_NAME = 'peça';

    public function __construct(
        Part $model,
    ) {
        parent::__construct($model, self::MODEL_NAME);
    }
}

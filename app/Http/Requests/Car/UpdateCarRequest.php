<?php

namespace App\Http\Requests\Car;

use App\Http\Requests\BaseRequest;

class UpdateCarRequest extends BaseRequest
{

    public function rules(): array
    {
        return [
            'plate' => 'sometimes|string',
            'model' => 'sometimes|string',
            'brand' => 'sometimes|string',
            'year' => 'sometimes|numeric',
            'color' => 'sometimes|string',
            'owner_name' => 'sometimes|string',
            'owner_phone' => 'sometimes|string'
        ];
    }
}

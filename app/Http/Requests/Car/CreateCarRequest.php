<?php

namespace App\Http\Requests\Car;

use App\Http\Requests\BaseRequest;

class CreateCarRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'plate' => 'required|string',
            'model' => 'required|string',
            'brand' => 'required|string',
            'year' => 'required|numeric',
            'color' => 'required|string',
            'owner_name' => 'required|string',
            'owner_phone' => 'required|string'
        ];
    }
}

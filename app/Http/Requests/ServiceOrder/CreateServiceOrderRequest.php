<?php

namespace App\Http\Requests\ServiceOrder;

use App\Http\Requests\BaseRequest;

class CreateServiceOrderRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'car_id' => 'required|exists:cars,id'
        ];
    }
}

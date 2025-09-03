<?php

namespace App\Http\Requests\ServiceOrder;

use App\Enum\PaymentMethodsEnum;
use App\Http\Requests\BaseRequest;

class UpdateServiceOrderRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'payment_method' => 'required|string|in:' . implode(',', PaymentMethodsEnum::values())
        ];
    }
}

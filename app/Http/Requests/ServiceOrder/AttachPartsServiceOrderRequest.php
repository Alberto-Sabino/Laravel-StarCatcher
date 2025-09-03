<?php

namespace App\Http\Requests\ServiceOrder;

use App\Http\Requests\BaseRequest;

class AttachPartsServiceOrderRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'parts' => 'required|array',
            'parts.*.id' => 'required|exists:parts,id',
            'parts.*.quantity' => 'required|integer|min:1'
        ];
    }
}

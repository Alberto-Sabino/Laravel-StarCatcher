<?php

namespace App\Http\Requests\Part;

use App\Http\Requests\BaseRequest;

class CreatePartRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'brand' => 'required|string',
            'price' => 'required|numeric'
        ];
    }
}

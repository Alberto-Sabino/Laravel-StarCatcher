<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderPart extends Model
{
    protected $fillable = [
        'service_order_id',
        'part_id',
        'quantity',
    ];

    protected $casts = [
        'service_order_id' => 'integer',
        'part_id' => 'integer',
        'quantity' => 'integer'
    ];

    protected $hidden = [
        'service_order_id',
        'part_id'
    ];
}

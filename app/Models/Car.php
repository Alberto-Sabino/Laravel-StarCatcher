<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'plate',
        'model',
        'brand',
        'year',
        'color',
        'owner_name',
        'owner_phone',
        'in_workshop',
    ];

    protected $casts = [
        'in_workshop' => 'boolean',
        'year' => 'integer'
    ];

    /**
     * Relacionamento com as ordens de serviço.
     */
    public function serviceOrders()
    {
        return $this->hasMany(ServiceOrder::class);
    }
}

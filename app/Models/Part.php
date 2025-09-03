<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    protected $fillable = [
        'name',
        'brand',
        'price'
    ];

    protected $casts = [
        'price' => 'float',
        'id' => 'integer'
    ];

    protected $hidden = ['created_at', 'updated_at'];

    /**
     * Relacionamento com as ordens de serviço.
     */
    public function serviceOrders()
    {
        return $this->belongsToMany(ServiceOrder::class, 'order_parts')
            ->withPivot('quantity')
            ->withTimestamps();
    }
}

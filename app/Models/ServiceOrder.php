<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    protected $fillable = [
        'car_id',
        'total_value',
        'payment_method',
        'is_open',
    ];

    protected $casts = [
        'is_open' => 'boolean',
    ];

    /**
     * Relacionamento com o veículo associado a esta ordem de serviço.
     */
    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    /**
     * Relacionamento com as peças associadas a esta ordem de serviço.
     */
    public function parts()
    {
        return $this->belongsToMany(Part::class, 'order_parts')
            ->withPivot('quantity')
            ->withTimestamps();
    }

    public function calculateTotalValue(): float
    {
        $totalValue = 0.0;
        foreach ($this->parts as $part) {
            $totalValue += $part->price * $part->pivot->quantity;
        }

        $this->total_value = $totalValue;
        $this->save();

        return $totalValue;
    }
}

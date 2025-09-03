<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password'
    ];

    /**
     * Hasheando automaticamente a senha ao definir.
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }
}

<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

trait AuthTrait
{
    public function getAuthUser()
    {
        return Cache::get(Session::get('access-token'));
    }

    public function getAuthUserId()
    {
        return $this->getAuthUser()->id;
    }
}

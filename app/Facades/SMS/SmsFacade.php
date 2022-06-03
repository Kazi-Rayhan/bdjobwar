<?php

namespace App\Facades\SMS;

use Illuminate\Support\Facades\Facade;

class SmsFacade extends Facade{

    protected static function getFacadeAccessor()
    {
        return 'SMS';
    }
}
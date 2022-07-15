<?php

namespace App\VetvineFacades;

use Illuminate\Support\Facades\Facade;

class VetvineHelperFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'vetvineHelper';
    }
}

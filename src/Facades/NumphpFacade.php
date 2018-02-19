<?php

namespace Girishk\Facades;

use Illuminate\Support\Facades\Facade;

class NumphpFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'girishk_numphp';
    }
}

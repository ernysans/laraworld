<?php

namespace ErnySans\Laraworld\Facades;

use Illuminate\Support\Facades\Facade;

class Countries extends Facade
{
    protected static function getFacadeAccessor() {
        return 'Countries';
    }
}
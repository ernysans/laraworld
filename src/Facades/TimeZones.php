<?php

namespace ErnySans\Laraworld\Facades;

use Illuminate\Support\Facades\Facade;

class TimeZones extends Facade
{
    protected static function getFacadeAccessor() {
        return 'TimeZones';
    }
}
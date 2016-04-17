<?php


namespace ErnySans\Laraworld;

use Illuminate\Support\Facades\Facade;

class LaraworldFacade extends Facade
{
    protected static function getFacadeAccessor() {
        return 'laraworld';
    }
}
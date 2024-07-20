<?php

namespace SimpleCMS\Nickname\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \SimpleCMS\Nickname\Packages\Nickname
 */
class Nickname extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'nickname';
    }
}

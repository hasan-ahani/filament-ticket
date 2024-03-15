<?php

namespace HasanAhani\FilamentTicket\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \HasanAhani\FilamentTicket\FilamentTicket
 */
class FilamentTicket extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \HasanAhani\FilamentTicket\FilamentTicket::class;
    }
}

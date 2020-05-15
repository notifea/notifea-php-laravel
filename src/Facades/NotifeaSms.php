<?php

namespace Notifea\Laravel\Facades;

use Illuminate\Support\Facades\Facade;

class NotifeaSms extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'notifea-sms';
    }

}

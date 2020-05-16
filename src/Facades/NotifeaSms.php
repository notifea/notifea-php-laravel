<?php

namespace Notifea\Laravel\Facades;

use Illuminate\Support\Facades\Facade;
use Notifea\Collections\Collection;
use Notifea\Entities\Sms;

/**
 * Class NotifeaSms
 * @package Notifea\Laravel\Facades
 *
 * @method static Collection getSmss()
 * @method static Sms getSms(string $emailUuid)
 * @method static Sms sendSms(Sms $email)
 * @method static bool deleteSms(string $emailUuid)
 */
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

<?php

namespace Notifea\Laravel\Facades;

use Illuminate\Support\Facades\Facade;
use Notifea\Collections\Collection;
use Notifea\Entities\Sms as SmsEntity;

/**
 * Class SMS
 * @package Notifea\Laravel\Facades
 *
 * @method static Collection getSmss()
 * @method static SmsEntity getSms(string $emailUuid)
 * @method static SmsEntity sendSms(SmsEntity $email)
 * @method static bool deleteSms(string $emailUuid)
 */
class SMS extends Facade
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

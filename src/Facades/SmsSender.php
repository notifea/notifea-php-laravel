<?php

namespace Notifea\Laravel\Facades;

use Illuminate\Support\Facades\Facade;
use Notifea\Collections\Collection;
use Notifea\Entities\SmsSender as SmsSenderEntity;

/**
 * Class SmsSender
 * @package Notifea\Laravel\Facades
 *
 * @method static Collection getSmsSenders()
 * @method static SmsSenderEntity getSmsSender(string $smsSenderUuid)
 * @method static SmsSenderEntity createSmsSender(SmsSenderEntity $smsSender)
 * @method static SmsSenderEntity updateSmsSender(SmsSenderEntity $smsSender)
 * @method static bool deleteSmsSender(string $smsSenderUuid)
 */
class SmsSender extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'notifea-sms-senders';
    }

}

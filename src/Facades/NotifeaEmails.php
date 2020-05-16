<?php

namespace Notifea\Laravel\Facades;

use Illuminate\Support\Facades\Facade;
use Notifea\Collections\Collection;
use Notifea\Entities\Email;

/**
 * Class NotifeaEmails
 * @package Notifea\Laravel\Facades
 *
 * @method static Collection getEmails()
 * @method static Email getEmail(string $emailUuid)
 * @method static Email sendEmail(Email $email)
 * @method static bool deleteEmail(string $emailUuid)
 */
class NotifeaEmails extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'notifea-emails';
    }

}

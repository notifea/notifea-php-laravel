<?php

namespace Notifea\Laravel\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application as Lumen;
use Notifea\Services\EmailService;
use Notifea\Services\SmsService;

class NotifeaServiceProvider extends ServiceProvider implements DeferrableProvider
{

    public static $globalName = 'notifea';

    public static $emailFacadeName = 'notifea-emails';
    public static $smsFacadeName = 'notifea-sms';

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/notifea.php' => config_path(self::$globalName . '.php'),
        ]);
    }

    public function register()
    {
        if ($this->app instanceof Lumen) {
            $this->app->configure(self::$globalName);
        }

        $this->app->singleton(EmailService::class, function($app) {
            return new EmailService(
                config('notifea.api_host'),
                config('notifea.authorization'),
                config('notifea.connect_timeout'),
                config('notifea.timeout')
            );
        });
        $this->app->alias(EmailService::class, self::$emailFacadeName);

        $this->app->singleton(SmsService::class, function($app) {
            return new SmsService(
                config('notifea.api_host'),
                config('notifea.authorization'),
                config('notifea.connect_timeout'),
                config('notifea.timeout')
            );
        });
        $this->app->alias(SmsService::class, self::$smsFacadeName);
    }

    /**
     * Get the services provided by the provider
     *
     * @return array|string[]
     */
    public function provides()
    {
        return [
            EmailService::class,
            SmsService::class,
            self::$emailFacadeName,
            self::$smsFacadeName,
        ];
    }

}

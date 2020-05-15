<?php

namespace Notifea\Laravel\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
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
        if (!$this->isLumen()) {
            $configPath = __DIR__.'/../config/' . self::$globalName . '.php';
            $this->publishes([$configPath => config_path(self::$globalName . '.php')], 'config');
        }
    }

    public function register()
    {
        if ($this->isLumen()) {
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
     * Check if package is running under Lumen app
     *
     * @return bool
     */
    protected function isLumen()
    {
        return Str::contains($this->app->version(), 'Lumen') === true;
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

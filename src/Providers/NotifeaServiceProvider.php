<?php

namespace Notifea\Laravel\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Notifea\Clients\NotifeaClient;
use Notifea\Services\EmailService;
use Notifea\Services\SmsSenderService;
use Notifea\Services\SmsService;

class NotifeaServiceProvider extends ServiceProvider implements DeferrableProvider
{

    public static $globalName = 'notifea';

    public static $emailFacadeName = 'notifea-emails';
    public static $smsFacadeName = 'notifea-sms';
    public static $smsSendersFacadeName = 'notifea-sms-senders';

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

        $this->app->singleton(NotifeaClient::class, function() {
            return new NotifeaClient(
                config('notifea.api_host'),
                config('notifea.authorization'),
                config('notifea.connect_timeout'),
                config('notifea.timeout')
            );
        });

        // emails
        $this->app->singleton(EmailService::class, function($app) {
            return new EmailService(
                $app->get(NotifeaClient::class)
            );
        });
        $this->app->alias(EmailService::class, self::$emailFacadeName);

        // sms
        $this->app->singleton(SmsService::class, function($app) {
            return new SmsService(
                $app->get(NotifeaClient::class)
            );
        });
        $this->app->alias(SmsService::class, self::$smsFacadeName);

        // sms senders
        $this->app->singleton(SmsSenderService::class, function($app) {
            return new SmsSenderService(
                $app->get(NotifeaClient::class)
            );
        });
        $this->app->alias(SmsSenderService::class, self::$smsSendersFacadeName);
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
            SmsSenderService::class,
            self::$emailFacadeName,
            self::$smsFacadeName,
            self::$smsSendersFacadeName
        ];
    }

}

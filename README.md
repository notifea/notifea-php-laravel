# notifea-php-laravel
Laravel wrapper for PHP language for Notifea services.

[Notifea](https://notifea.com) provides clients very user-friendly way of sending transactional emails
and sms to their users.

This package is a Laravel wrapper for [Notifea PHP package](https://github.com/notifea/notifea-php).

## Minimum requirements

This package will require you to use:
- PHP 7.0 or higher
- [guzzlehttp/guzzle](https://github.com/guzzle/guzzle) 6.0 or higher 

## Installation

To install the SDK you need to be using [Composer]([https://getcomposer.org/)
in your project. To install it please see the [docs](https://getcomposer.org/download/).

After you installed [Composer]([https://getcomposer.org/) install the SDK 

```shell script
composer require notifea/notifea-php-laravel
```

Don't forget to publish configuration file

```shell script
php artisan vendor:publish --provider='Notifea\Laravel\Providers\NotifeaServiceProvider'
```

In the `notifea.php` config file you are only required to set `authorization` config key by 
setting `NOTIFEA_API_AUTHORIZATION` environment variable. Value can be generated in
 [access-tokens](https://app.notifea.com/access-tokens) section.

If auto discovery of this package does not work for you for any reason, add `Notifea\Laravel\Providers\NotifeaServiceProvider`
to file `config/app.php` to the section `providers`

```php
    'providers' => [
        /*
         * Laravel Framework Service Providers...
         */
        Notifea\Laravel\Providers\NotifeaServiceProvider::class,
    ];
``` 

## Usage

This packages provides a convenient dependency injection layer
for `Notifea\Services\EmailService` and `Notifea\Services\SmsService` implemented in our 
core [Notifea PHP package](https://github.com/notifea/notifea-php) so they can be easily used anywhere in
your Laravel application.

One could inject them like this:

```php
class UserController
{
    public function sendEmail(Request $request, EmailService $emailService)
    {
        // .. your business logic
        $email = new Email();
        // ... 
        $sentEmail = $emailService->sendEmail($email);
    }

    public function sendSms(Request $request, SmsService $smsService)
    {
        // .. your business logic
        $sms = new Sms();
        // ... 
        $sentSms = $smsService->sendSms($sms);
    }

}
```

To provide the quick accessibility of the methods anywhere in your code, there is also
`Notifea\Laravel\Facades\Emails` and `Notifea\Laravel\Facades\SMS` facade available to you.

`Emails` facade contains these methods:
- getEmails()
- getEmail(string $emailUuid)
- sendEmail(Email $email)
- deleteEmail(string $emailUuid)

`SMS` facade contains these methods:
- getSmss()
- getSms(string $smsUuid)
- sendSms(Sms $sms)
- deleteSms(string $smsUuid)

To find more detailed documentation about each methods, check out our core [Notifea PHP package](https://github.com/notifea/notifea-php)

## Community

- [Documentation](https://docs.notifea.com)
- [Report issues](https://github.com/notifea/notifea-php/issues)

## Contributing

Dependencies are managed through `composer`:

```
$ composer install
```

Tests can be run via phpunit:

```
$ vendor/bin/phpunit
```

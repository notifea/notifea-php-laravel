# notifea-php-laravel
Laravel wrapper for PHP language for Notifea services.

[Notifea](https://notifea.com) provides clients very user-friendly way of sending transactional emails
and sms to their users.

This package is a Laravel wrapper for [Notifea PHP package](https://github.com/notifea/notifea-php).

**Please note that our services are in alpha phase and are not yet available to public.** 

## Installation

To install the SDK you need to be using [Composer]([https://getcomposer.org/)
in your project. To install it please see the [docs](https://getcomposer.org/download/).

After you installed [Composer]([https://getcomposer.org/) install the SDK 

```shell script
composer require notifea/notifea-php
```

Don't forget to publish configuration file

```shell script
php artisan vendor:publish --provider='Notifea\Laravel\Providers\NotifeaServiceProvider'
```

## Minimum requirements

This package will require you to use:
- PHP 7.0 or higher
- [guzzlehttp/guzzle](https://github.com/guzzle/guzzle) 6.0 or higher 


## Usage

TBA

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

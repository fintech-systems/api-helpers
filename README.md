# Laravel API Helpers

[![Latest Stable Version](https://poser.pugx.org/fintech-systems/laravel-api-helpers/v/stable?format=flat-square)](https://packagist.org/packages/fintech-systems/laravel-api-helpers)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/fintech-systems/laravel-api-helpers/run-tests?label=tests)](https://github.com/fintech-systems/laravel-api-helpers/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/fintech-systems/laravel-api-helpers/Check%20&%20fix%20styling?label=code%20style)](https://github.com/fintech-systems/laravel-api-helpers/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/fintech-systems/laravel-api-helpers.svg?style=flat-square)](https://packagist.org/packages/fintech-systems/laravel-api-helpers)
[![GitHub license](https://img.shields.io/github/license/fintech-systems/laravel-api-helpers)](https://github.com/fintech-systems/laravel-api-helpers/blob/main/LICENSE.md)

---
A helper library to facilitate working with APIs

API: Delete, Get, Post

`public function delete(String $url, array $header = [], String $postFields = '')`

`public function get(String $url, array $header)`

`public function post(String $url, String $postFields, array $header = [])`

You'll notice the signatures for delete and post are swapped. That's because typically with a Restfull DELETE command you would not need post fields.

Laravel API Helper Command - facilitates caching JSON API responses

Example:

```php
class UserCommand extends LaravelApiHelpersCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:get-users {--cached}';

    ...

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if ($file = $this->checkCachedFileExists()) {
            $this->info('A cached API result file was returned');

            return $file;
        }

        $result = file_put_contents($this->cachedFile, Api::getUsers());
        $this->info('The API command was successful');

        return $result;
    }
```

---

## Installation

You can install the package via composer:

```bash
composer require fintech-systems/laravel-api-helpers
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="FintechSystems\LaravelApiHelpers\LaravelApiHelpersServiceProvider" --tag="laravel-api-helpers-migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="FintechSystems\LaravelApiHelpers\LaravelApiHelpersServiceProvider" --tag="laravel-api-helpers-config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$laravel-api-helpers = new FintechSystems\LaravelApiHelpers();
echo $laravel-api-helpers->echoPhrase('Hello, FintechSystems!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Eugene van der Merwe](https://github.com/fintech-systems)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

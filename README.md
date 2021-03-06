# Laravel API Helpers

[![Latest Stable Version](https://poser.pugx.org/fintech-systems/laravel-api-helpers/v/stable?format=flat-square)](https://packagist.org/packages/fintech-systems/laravel-api-helpers)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/fintech-systems/laravel-api-helpers/run-tests?label=tests)](https://github.com/fintech-systems/laravel-api-helpers/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/fintech-systems/laravel-api-helpers/Check%20&%20fix%20styling?label=code%20style)](https://github.com/fintech-systems/laravel-api-helpers/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/fintech-systems/laravel-api-helpers.svg?style=flat-square)](https://packagist.org/packages/fintech-systems/laravel-api-helpers)
[![GitHub license](https://img.shields.io/github/license/fintech-systems/laravel-api-helpers)](https://github.com/fintech-systems/laravel-api-helpers/blob/main/LICENSE.md)

---
## A helper library to facilitate working with APIs

### API: Get, Post, Delete

`public function get(string $url, array $header = [])`

`public function post(string $url, string|array $postFields, array $header = [])`

`public function delete(string $url, string|array $postFields = '', array $header = [])`

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
## Usage

### WhatsApp to WHMCS phone number conversion

```php
$api = new Api();
$result = $api->convertWhatsAppNumberToWhmcsPhoneNumber('27823096710');
expect($result)->toEqual('+27.82 309 6710');

$api = new Api();
$result = $api->convertWhatsAppNumberToWhmcsPhoneNumber('14085551234');
expect($result)->toEqual('+1.408-555-1234');
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

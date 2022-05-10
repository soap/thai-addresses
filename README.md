
# Thai provinces database for Laravel application

[![Latest Version on Packagist](https://img.shields.io/packagist/v/soap/thai-provinces.svg?style=flat-square)](https://packagist.org/packages/soap/thai-provinces)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/soap/thai-provinces/run-tests?label=tests)](https://github.com/soap/thai-provinces/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/soap/thai-provinces/Check%20&%20fix%20styling?label=code%20style)](https://github.com/soap/thai-provinces/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/soap/thai-provinces.svg?style=flat-square)](https://packagist.org/packages/soap/thai-provinces)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Support us

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://mycoding.academy/about-us). We publish all received postcards on [our virtual postcard wall](https://mycoding.academy/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require soap/thai-provinces
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="thai-provinces-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="thai-provinces-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="thai-provinces-views"
```

## Usage

```php
$thaiProvinces = new Soap\ThaiProvinces();
echo $thaiProvinces->echoPhrase('Hello, Soap!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Prasit Gebsaap](https://github.com/soap)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.


# Thai addressable mdoels and provinces database for Laravel application.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/soap/thai-provinces.svg?style=flat-square)](https://packagist.org/packages/soap/thai-provinces)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/soap/thai-provinces/run-tests?label=tests)](https://github.com/soap/thai-provinces/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/soap/thai-provinces/Check%20&%20fix%20styling?label=code%20style)](https://github.com/soap/thai-provinces/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/soap/thai-provinces.svg?style=flat-square)](https://packagist.org/packages/soap/thai-provinces)

This package provide basic thailand provinces database including districts and subdistricts. Addresable models also provided to use with any Eloquent models.

## Support us

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://mycoding.academy/about-us). We publish all received postcards on [our virtual postcard wall](https://mycoding.academy/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require soap/thai-addresses
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="thai-addresses-config"
```

This is the contents of the published config file:

```php
return [
    // model definition
    "geography" => [
        "table_name" => "thai_geographies",
        "foreign_key" => "geography_id"
    ],

    "province" => [
        "table_name" => "thai_provinces",
        "foreign_key" => "province_id"
    ],
    
    "district" => [
        "table_name" => "districts",
        "foreign_key" => "district_id"
    ],

    "subdistrict" => [
        "table_name" => "subdistricts",
    ],

    "address" => [
        "table_name" => "addresses"
    ]
];
```
You can change table name for all models in the configuration file.

Then you can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="thai-addresses-migrations"
php artisan migrate
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="thai-addresses-views"
```

## Usage

```php
$thaiAddresses = new Soap\ThaiAddresses();

$thaiAddresses->getProvinces();

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

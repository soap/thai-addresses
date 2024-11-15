
# Thai addressable mdoels and provinces database for Laravel.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/soap/thai-addresses.svg?style=flat-square)](https://packagist.org/packages/soap/thai-addresses)
[![run-tests](https://github.com/soap/thai-addresses/actions/workflows/run-tests.yml/badge.svg)](https://github.com/soap/thai-addresses/actions/workflows/run-tests.yml)
[![Check & fix styling](https://github.com/soap/thai-addresses/actions/workflows/php-cs-fixer.yml/badge.svg)](https://github.com/soap/thai-addresses/actions/workflows/php-cs-fixer.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/soap/thai-addresses.svg?style=flat-square)](https://packagist.org/packages/soap/thai-addresses)

This package provides basic thailand provinces database including districts and subdistricts. Addressable models also provided to use with any Eloquent models.
## Version Support
| Laravel       | Version       |
| ------------- | ------------- |
| 8.x           | 1.x           |
| 9.x           | 2.x           |
| 10.x, 11.x    | 3.x           |

## Support us

If you found benefit from using the package, you can recommend any approvements, bugs report or even support me through GitHub Sponsor.

## Requirements
soap/thai-addresses v3.x supports Laravel 10 and 11 on PHP8.2 and 8.3.
soap/thai-addresses v2.x for Laravel 9 and PHP 8.0 or 8.1. If you use Laravel 8, please see [release 1.x](https://github.com/soap/thai-addresses/tree/1.x) then. 

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
        "table_name" => "addresses",
         "model" => \Soap\ThaiAddresses\Models\Address::class
    ]
];
```
You can change table name for all models in the configuration file.

Then you can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="thai-addresses-migrations"
php artisan migrate
```

Optionally, you can install configuration and migration files using install command.

```bash
php artisan thai-addresses:install
```

## Usage

If you want to use only province, district and subdistrict data, you can just run database seeding.

```bash
php artisan thai-addresses:db-seed
```
This will install all thai addresses data to the database as configure in the thai-addresses.conf file.

### Manage your address
To add addresses support to your eloquent models simply use \Soap\ThaiAddresses\Traits\HasAddress trait. This package provide polymorphic addressable model. By using this feature, any model can have addresses.

In your App\Models\User.php

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Soap\ThaiAddresses\Tests\Database\Factories\UserFactory;
use Soap\ThaiAddresses\Traits\HasAddress;

class User extends Authenticatable
{
    use HasFactory;
    use HasAddress;

    protected $guarded = [];

    protected $fillable = [
        'name',
        'email',
    ];

}
```
Then your user can have addresses!

```php
// Get instance of your model
$user = new \App\Models\User::find(1);

// Create a new address
$user->addresses()->create([
    'label' => 'Default Address',
    'given_name' => 'Prasit',
    'family_name' => 'Gebsaap',
    'organization' => 'KPS Academy',
    'street' => '1/8 Watchara road',
    'subdistrict_id' => Subdistrict::where('name_th','=','กระบี่ใหญ่')->first()->id,
    'latitude' => '31.2467601',
    'longitude' => '29.9020376',
    'is_primary' => true,
    'is_billing' => true,
    'is_shipping' => true,
]);

// Create multiple new addresses
$user->addresses()->createMany([
    [...],
    [...],
    [...],
]);

// Find an existing address
$address = app('thai-addresses.address.model')->find(1);

// Update an existing address
$address->update([
    'label' => 'Default Work Address',
]);

// Delete address
$address->delete();

// Alternative way of address deletion
$user->addresses()->where('id', 123)->first()->delete();

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

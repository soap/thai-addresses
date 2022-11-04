<?php

namespace Soap\ThaiAddresses\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Soap\ThaiAddresses\Facades\ThaiAddresses;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'given_name',
        'family_name',
        'organization',
        'street',
        'postal_code',
        'latitude', 'longitude',
        'is_primary', 'is_billing', 'is_shipping',

    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->table = ThaiAddresses::getAddressTableName();
    }
}

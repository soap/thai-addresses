<?php

namespace Soap\ThaiAddresses\Tests\Feature;

use Soap\ThaiAddresses\Models\Address;
use Soap\ThaiAddresses\Models\Subdistrict;
use Soap\ThaiAddresses\Tests\Models\User;

it('user can have address', function () {
    $user = User::factory()->create();
    $subdistrict = Subdistrict::where('name_th', '=', 'กระบี่ใหญ่')->first();
    $address = new Address;
    $address->fill([
        'label' => 'Default Address',
        'given_name' => 'Prasit',
        'family_name' => 'Gebsaap',
        'organization' => 'KPS Academy',
        'street' => '1/8 Watchara road',
        'subdistrict_id' => $subdistrict->id,
        'postal_code' => '81000',
        'latitude' => '31.2467601',
        'longitude' => '29.9020376',
        'is_primary' => true,
        'is_billing' => true,
        'is_shipping' => true,
    ]);

    $user->addresses()->save($address);

    $this->assertCount(1, $user->addresses, 'User can be assigned address');
});

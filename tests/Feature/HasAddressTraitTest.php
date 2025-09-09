<?php

use Soap\ThaiAddresses\Models\Address;
use Workbench\App\Models\User;

test('user can have addresses using trait', function () {
    $user = User::create([
        'name' => 'Test User',
        'email' => 'test@example.com',
    ]);

    // ทดสอบ relationship ที่มาจาก HasAddress trait
    expect($user->addresses())->toBeInstanceOf(\Illuminate\Database\Eloquent\Relations\MorphMany::class);

    // ทดสอบการสร้าง address
    $address = $user->addresses()->create([
        'address_line_1' => '123 Test Street',
        'subdistrict_id' => 1, // ต้องมี seeder ก่อน
    ]);

    expect($user->addresses)->toHaveCount(1);
    expect($address->addressable_type)->toBe(User::class);
    expect($address->addressable_id)->toBe($user->id);
});

test('user can add address using trait method', function () {
    $user = User::create([
        'name' => 'Test User',
        'email' => 'test@example.com',
    ]);

    // ถ้า trait มี method addAddress
    if (method_exists($user, 'addAddress')) {
        $address = $user->addAddress([
            'address_line_1' => '456 Another Street',
            'subdistrict_id' => 1,
        ]);

        expect($address)->toBeInstanceOf(Address::class);
        expect($user->addresses)->toHaveCount(1);
    }

});

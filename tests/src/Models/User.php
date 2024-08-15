<?php

namespace Soap\ThaiAddresses\Tests\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Soap\ThaiAddresses\Traits\HasAddress;

class User extends Authenticatable
{
    use HasAddress;
    use HasFactory;

    protected $guarded = ['id'];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}

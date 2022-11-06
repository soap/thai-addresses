<?php

namespace Soap\ThaiAddresses\Tests\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Soap\ThaiAddresses\Tests\Database\Factories\UserFactory;
use Soap\ThaiAddresses\Traits\HasAddress;

class User extends Authenticatable
{
    use HasFactory, HasAddress;

    protected $guarded = [];

    protected $fillable = [
        'name',
        'email'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected static function newFactory()
    {
        return UserFactory::new();
    }

    
}
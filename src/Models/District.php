<?php

namespace Soap\ThaiAddresses\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Soap\ThaiAddresses\Facades\ThaiAddresses;

class District extends Model
{
    use HasFactory;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->table = ThaiAddresses::getDistrictTableName();
    }
}

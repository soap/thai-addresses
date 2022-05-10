<?php

namespace Soap\ThaiProvinces\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Soap\ThaiProvinces\Facades\ThaiProvinces;

class District extends Model
{
    use HasFactory;

    public function __construct()
    {
        $this->table = ThaiProvinces::getDistrictTableName();
    }
}
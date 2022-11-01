<?php

namespace Soap\ThaiAddresses\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Soap\ThaiAddresses\Facades\ThaiAddresses;

class Province extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_th',
        'name_eng',
        'code',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->table = ThaiAddresses::getProvinceTableName();
    }
}

<?php

namespace Soap\ThaiAddresses\Models;

use Illuminate\Database\Eloquent\Model;
use Soap\ThaiAddresses\Facades\ThaiAddresses;
use Soap\ThaiAddresses\Models\Province;

class District extends Model
{
    protected $fillable = [
        'name_th',
        'name_en',
        'code',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->table = ThaiAddresses::getDistrictTableName();
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function subdistricts()
    {
        return $this->hasMany(Subdistrict::class);
    }
}

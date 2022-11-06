<?php

namespace Soap\ThaiAddresses\Models;

use Illuminate\Database\Eloquent\Model;
use Soap\ThaiAddresses\Facades\ThaiAddresses;

class Province extends Model
{

    protected $fillable = [
        'name_th',
        'name_en',
        'code',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->table = ThaiAddresses::getProvinceTableName();
    }

    public function geography()
    {
        return $this->belongsTo(Geography::class);
    }

    public function districts()
    {
        return $this->hasMany(District::class);
    }
}

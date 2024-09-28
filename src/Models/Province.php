<?php

namespace Soap\ThaiAddresses\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Soap\ThaiAddresses\Facades\ThaiAddresses;

class Province extends Model
{
    protected $fillable = [
        'name_th',
        'name_en',
        'code',
    ];

    public function getTable()
    {
        return ThaiAddresses::getProvinceTableName();
    }

    public function geography(): BelongsTo
    {
        return $this->belongsTo(Geography::class);
    }

    public function districts(): HasMany
    {
        return $this->hasMany(District::class);
    }
}

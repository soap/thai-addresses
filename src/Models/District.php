<?php

namespace Soap\ThaiAddresses\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Soap\ThaiAddresses\Facades\ThaiAddresses;

class District extends Model
{
    protected $fillable = [
        'name_th',
        'name_en',
        'code',
    ];

    public function getTable()
    {
        return ThaiAddresses::getDistrictTableName();
    }

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }

    public function subdistricts(): HasMany
    {
        return $this->hasMany(Subdistrict::class);
    }
}

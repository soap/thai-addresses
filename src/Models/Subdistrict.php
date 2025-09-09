<?php

namespace Soap\ThaiAddresses\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Soap\ThaiAddresses\ThaiAddresses;

class Subdistrict extends Model
{
    use HasFactory;

    protected $fillable = [
        'zip_code',
        'name_th',
        'name_en',
    ];

    public function getTable(): string
    {
        return ThaiAddresses::getSubdistrictTableName();
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class, ThaiAddresses::getDistrictForeignKeyName());
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class, ThaiAddresses::getAddressForeignKeyName());
    }
}

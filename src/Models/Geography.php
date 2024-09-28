<?php

namespace Soap\ThaiAddresses\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Soap\ThaiAddresses\Facades\ThaiAddresses;

/**
 * @property string $name_th
 * @property string $name_en
 */
class Geography extends Model
{
    protected $fillable = [
        'name_th',
        'name_en',
    ];

    public function getTable()
    {
        return ThaiAddresses::getGeographyTableName();
    }

    public function provinces(): HasMany
    {
        return $this->hasMany(Province::class);
    }
}

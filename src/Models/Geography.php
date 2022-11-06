<?php

namespace Soap\ThaiAddresses\Models;

use Illuminate\Database\Eloquent\Model;
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

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->table = ThaiAddresses::getGeographyTableName();
    }

    public function provinces()
    {
        return $this->hasMany(Province::class);
    }
}

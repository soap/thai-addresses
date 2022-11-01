<?php

namespace Soap\ThaiAddresses\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Soap\ThaiAddresses\Facades\ThaiAddresses;

class Geography extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_th',
        'name_eng',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->table = ThaiAddresses::getGeographyTableName();
    }
}

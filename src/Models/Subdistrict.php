<?php

namespace Soap\ThaiAddresses\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Soap\ThaiAddresses\Facades\ThaiAddresses;

class Subdistrict extends Model
{
    use HasFactory;

    protected $fillable = [
        'zip_code',
        'name_th',
        'name_en',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->table = ThaiAddresses::getSubdistrictTableName();
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}

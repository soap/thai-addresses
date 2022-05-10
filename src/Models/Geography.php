<?php

namespace Soap\ThaiProvinces\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Soap\ThaiProvinces\Facades\ThaiProvinces;

class Geography extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name_th',
        'name_eng'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        
        $this->table = ThaiProvinces::getGeographyTableName();
    }
}

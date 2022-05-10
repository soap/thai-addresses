<?php

namespace Soap\ThaiProvinces\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Soap\ThaiProvinces\Facades\ThaiProvinces;

class Province extends Model 
{
    use HasFactory;
    
    protected $fillable = [
        'name_th',
        'name_eng',
        'code'
    ];

    protected static function newFactory()
    {
        return \Soap\ThaiProvinces\Database\Factories\ProvinceFactory::new();
    }

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        
        $this->table = ThaiProvinces::getProvinceTableName();
    }   
}
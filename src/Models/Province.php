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

    public function __construct()
    {
        $this->table = ThaiProvinces::getProvinceTableName();
    }   
}
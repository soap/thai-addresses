<?php

namespace Soap\ThaiProvinces\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Soap\ThaiProvinces\Facades\ThaiProvinces;
use Soap\ThaiProvinces\Models\Geography;

class GeographyFactory extends Factory
{
    protected $model = Geography::class;

    public function definition()
    {
        return [
            "name_en" => $this->faker->randomKey(),
            "name_th" => $this->faker->randomKey(),
        ];
    }

}
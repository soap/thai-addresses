<?php

namespace Soap\ThaiProvinces\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Soap\ThaiProvinces\Facades\ThaiProvinces;
use Soap\ThaiProvinces\Models\Province;

class ProvinceFactory extends Factory
{
    protected $model = Province::class;

    public function definition()
    {
        return [
            'code' => $this->faker->randomLetter(),
            'name_th' => $this->faker->city,
            'name_eng' => $this->faker->city,
            ThaiProvinces::getGeographyIdName() => $this->faker->randomDigitNotZero(),
        ];
    }
}

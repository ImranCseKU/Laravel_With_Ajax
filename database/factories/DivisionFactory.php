<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TblDivision;
use Faker\Generator as Faker;

$factory->define(TblDivision::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'phone_extension' => $faker->numberBetween($min = 100, $max = 999),
    ];
});

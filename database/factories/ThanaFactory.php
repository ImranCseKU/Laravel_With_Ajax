<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TblThana;
use Faker\Generator as Faker;

$factory->define(TblThana::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'parent_id'=>random_int(1,30),
        'phone_extension' => $faker->numberBetween($min = 100, $max = 999),
    ];
});

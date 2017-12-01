<?php

use Faker\Generator as Faker;

$factory->define(App\Student::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'currentproject' => $faker->name(),
        'user_id' => $faker->numberBetween($min = 1, $max = 1 )
    ];
});

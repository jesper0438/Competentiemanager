<?php

use Faker\Generator as Faker;

$factory->define(App\Vakexpert::class, function (Faker $faker) {
    return [
        'name'        => $faker->name(),
        'competentie' => $faker->name(),
        'user_id'     => $faker->numberBetween($min = 1, $max = 1),
        'description' => $faker->name(),
    ];
});

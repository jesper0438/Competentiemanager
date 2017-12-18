<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    return [
        'opdrachtgever'  => $faker->sentence(),
        'uitvoerlocatie' => $faker->sentence(),
        'user_id'        => $faker->numberBetween($min = 1, $max = 1),
        'doel'           => $faker->sentence(),
        'competenties'   => $faker->sentence(),
        'maxleden'       => $faker->sentence(),

    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Location;
use Faker\Generator as Faker;

$factory->define(App\Location::class, function (Faker $faker) {
    return [
        'location' => $faker->locale,
    ];
});

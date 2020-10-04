<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\History;
use Faker\Generator as Faker;

$factory->define(History::class, function (Faker $faker) {
    return [
        'trip_date' => $faker->dateTimeThisYear,
        'member_id' => App\Member::inRandomOrder()->first()->id,
        'start' => mt_rand(0,1),
        'location_id' => App\Location::inRandomOrder()->first()->id,
    ];
});

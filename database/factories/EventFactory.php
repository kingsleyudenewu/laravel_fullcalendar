<?php

use Faker\Generator as Faker;

$factory->define(App\Event::class, function (Faker $faker) {
    return [
        'title' =>$faker->name,
        'start_date' =>$faker->dateTimeThisYear(),
        'end_date' =>$faker->dateTimeThisYear('+1 day')

    ];
});

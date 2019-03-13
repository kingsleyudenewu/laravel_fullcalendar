<?php

use Faker\Generator as Faker;

$factory->define(App\Event::class, function (Faker $faker) {
    return [
        'title' =>$faker->name,
        'start_date' =>$faker->date(),
        'end_date' =>$faker->date()

    ];
});

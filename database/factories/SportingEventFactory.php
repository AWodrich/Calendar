<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Club;
use App\Discipline;
use App\SportingEvent;
use Faker\Generator as Faker;

$factory->define(SportingEvent::class, function (Faker $faker)
{
    return [
        'location'        => $faker->city,
        'referee'         => $faker->name,
        'date'            => $faker->date(),
        '_home_id'        => function ()
        {
            return App\Club::inRandomOrder()->first()->id;
        },
        '_outward_id'     => function ()
        {
            return App\Club::inRandomOrder()->first()->id;
        },
        '_disciplines_id' => function ()
        {
            return App\Discipline::inRandomOrder()->first()->id;
        },
    ];

});


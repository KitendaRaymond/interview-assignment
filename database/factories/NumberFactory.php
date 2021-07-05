<?php

use Faker\Generator as Faker;
use App\Number;

$factory->define(Number::class, function (Faker $faker) {
    return [
        //
        'maximum' => $faker->maximum
    ];
});

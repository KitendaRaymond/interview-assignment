<?php

use Faker\Generator as Faker;
use App\Sacco;

$factory->define(Sacco::class, function (Faker $faker) {
    return [
        
        //Here we specify the fields for the Sacco table and use Faker factory to generate some random data in correct format
        'country' => $faker->country,
        'name' => $faker->name
    ];
});

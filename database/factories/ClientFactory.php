<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'client_type' => $faker->name,
        'name' => $faker->name,
        'phone' => $faker->randomNumber($nbDigits = null, $strict = false),
        'address' => $faker->address,
        'description' => $faker->sentence,
    ];
});

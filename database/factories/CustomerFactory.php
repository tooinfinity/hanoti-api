<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'phone' => $faker->randomNumber($nbDigits = null, $strict = false),
        'address' => $faker->address,
        'description' => $faker->sentence,
    ];
});

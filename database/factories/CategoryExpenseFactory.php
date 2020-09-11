<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CategoryExpense;
use Faker\Generator as Faker;

$factory->define(CategoryExpense::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Expense;
use Faker\Generator as Faker;
use App\Models\CategoryExpense;

$factory->define(Expense::class, function (Faker $faker) {
    return [
        'category_expense_id' => $faker->numberBetween(1, CategoryExpense::count()),
        'description' => $faker->sentence,
        'amount' => $faker->randomFloat($nbMaxDecimals = 2, $min = 100, $max = 10000),
    ];
});

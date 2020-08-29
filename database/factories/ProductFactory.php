<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use App\Models\Product;
use App\Models\Unit;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'category_id' => $faker->numberBetween(1, Category::count()),
        'unit_id' => $faker->numberBetween(1, Unit::count()),
        'name' => $faker->name,
        'description' => $faker->sentence,
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'stock' => $faker->numberBetween($min = 1, $max = 200),
        'sale_price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 100, $max = 10000),
        'purchase_price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 100, $max = 10000),
    ];
});

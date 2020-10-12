<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use app\Helpers\Helpers;
use App\Models\Category;
use App\Models\Product;
use App\Models\Unit;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $number = 0;
    if ($number === 0 && $number === 1) {
        $number = 1;
    } else {
        $number++;
    }

    $productName = $faker->name;

    return [
        'category_id' => $faker->numberBetween(1, Category::count()),
        'unit_id' => $faker->numberBetween(1, Unit::count()),
        'name' => $productName,
        'sku' => Helpers::getSKUProduct($productName, $number),
        'barcode' => Helpers::getBarcodeProduct($productName),
        'description' => $faker->sentence,
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'quantity' => $faker->numberBetween($min = 1, $max = 200),
        'sell_price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 100, $max = 10000),
        'purchase_price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 100, $max = 10000),
    ];
});

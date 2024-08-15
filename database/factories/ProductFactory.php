<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
   
    return [
        'code'=>$faker->ean8,
        'name'=>$faker->streetName,
        'slug'=>$faker->unique()->slug,
        'stock'=> 150,
        'short_description'=>$faker->realText($maxNbChars = 360, $indexSize = 2),
        'long_description'=>$faker->sentence($nbWords = 360, $variableNbWords = true),
        'sell_price' => $faker->numberBetween(10000, 200000),
        'status'=>'ACTIVE',
        'category_id'=>rand(1,10),
        'provider_id'=>rand(1,10),
    ];
});

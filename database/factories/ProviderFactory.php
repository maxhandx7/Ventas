<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Provider;
use Faker\Generator as Faker;

$factory->define(Provider::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'email' => $faker->email,
        'nit_number' => $faker->numberBetween($min = 10000000000, $max = 11111111111),
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
    ];
});

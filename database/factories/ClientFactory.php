<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'name'=>$faker->lastName,
        'cc'=>$faker->numberBetween($min = 70000000, $max = 71111111),
        'rut'=>$faker->numberBetween($min = 10000000000, $max = 11111111111),
        'address'=>$faker->address,
        'phone'=>$faker->phoneNumber,
        'email'=>$faker->email,
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Category::class, function (Faker $faker) {
    $name = $this->faker->unique()->word();
    return [
        'name' => $name,
        'slug' => Str::slug($name),
        'category_type' => $faker->randomElement([
            'PRODUCT',
            'POST'
        ]),
        'description' => $faker->sentence($nbWords = 360, $variableNbWords = true),
        'icon' => $faker->randomElement(
            [
                'icon-vector',
                'icon-pin',
                'icon-film',
                'icon-briefcase',
                'icon-bag',
                'icon-trash',
                'icon-rocket',
                'icon-grid',
                'icon-music-tone',
                'icon-control-rewind',
                'icon-volume-1',
                'icon-chart',
                'icon-info',
                'icon-key',
                'icon-lock-open',
                'icon-reload',
            ]
            ),
    ];
});

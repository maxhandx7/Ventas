<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Image;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    return [
        'url' => $faker->randomElement([
            '/image/product-b-1.jpg',
            '/image/product-b-2.jpg',
            '/image/product-b-3.jpg',
            '/image/product-b-4.jpg',
            '/image/product-f-1.jpg',
            '/image/product-f-2.jpg',
            '/image/product-f-3.jpg',
            '/image/product-f-4.jpg',
            '/image/product-img1.jpg',
            '/image/product-img2.jpg',
            '/image/product-img3.jpg',
            '/image/product-img4.jpg',
            '/image/product-img5.jpg',
            '/image/product-img6.jpg',
            '/image/product-img7.jpg',
            '/image/product-img8.jpg',
            '/image/product-img9.jpg',
            '/image/product-img10.jpg',
            '/image/product-img11.jpg',
            '/image/product-img12.jpg',
            '/image/product-img13.jpg',
            '/image/product-img14.jpg',
            '/image/product-img15.jpg',
            '/image/product-img16.jpg',
            '/image/product-s-1.jpg',
            '/image/product-s-2.jpg',
            '/image/product-s-3.jpg',
            '/image/product-s-4.jpg',
            '/image/product-s-5.jpg',
            '/image/product-s-6.jpg',
        ])
    ];
});

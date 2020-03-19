<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'body' => $faker->sentence(20),
        'image' => 'unknown.jpg',
        'user_id' => rand(1, 20),
        'category_id' => rand(1, 5),
    ];
});

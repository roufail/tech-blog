<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Article;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title' =>  $faker->name,
        'body' => $faker->sentence(10),
        'user_id' => 1
    ];
});

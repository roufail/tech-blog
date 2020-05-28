<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Page;
use Faker\Generator as Faker;

$factory->define(Page::class, function (Faker $faker) {
    $title = $faker->sentence(3);
    return [
        'title' => $title,
        'slug' => implode('-',explode(' ', strtolower($title))),
        'content' => $faker->sentence(20),
        'keywords' => implode(',',explode(' ',$faker->sentence(5))),
        'description' => $faker->sentence(10),
    ];
});

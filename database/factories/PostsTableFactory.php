<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use App\Models\User;
use Faker\Generator as Faker;
$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(5),
        'content' => $faker->sentence(20),
        //'image'   => $faker->image('storage/app/public/posts',400,300),
        'image'   => '',
        'user_id' => User::all()->random()->id,
        'keywords' => implode(',',explode(' ',$faker->sentence(20))),
        'description' => $faker->sentence(10),
    ];
});

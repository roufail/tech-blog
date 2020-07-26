<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ContactUs;
use Faker\Generator as Faker;

$factory->define(ContactUs::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'message' => $faker->paragraph(3),
        'read' => $faker->boolean
    ];
});

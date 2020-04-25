<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Testimonial;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Testimonial::class, function (Faker $faker) {
    return [
        'name'    => $faker->unique()->name(),
        'role'    => $faker->jobTitle,
        'stars'   => $faker->numberBetween(4, 5),
        'image'   => $faker->imageUrl('170', '170'),
        'message' => $faker->sentence(15, true),
    ];
});

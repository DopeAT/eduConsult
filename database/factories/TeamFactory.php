<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Team;
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

$factory->define(Team::class, function (Faker $faker) {

    $number = $faker->numberBetween(1245, 12354585);


    return [
        'name'       => $faker->unique()->name(),
        'profession' => $faker->jobTitle,
        'text'       => $faker->sentence(45, true),
        'image'      => 'https://placekitten.com/200/200?'.$number,
    ];
});

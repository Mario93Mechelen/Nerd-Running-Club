<?php

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

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'strava_id' => $faker->randomDigit,
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'avatar' => $faker->imageUrl(),
        'email' => $faker->unique()->safeEmail,
        'token' => $faker->randomDigit,
        'gender' => $faker->randomDigit,
        'remember_token' => str_random(10),
    ];
});

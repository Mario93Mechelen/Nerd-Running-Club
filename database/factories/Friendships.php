<?php

use Faker\Generator as Faker;

$factory->define(App\Friends::class, function (Faker $faker) {
    return [
        //
        'user_id' => $faker->unique()->randomDigit,
        'friend_id' => 1,
        'follow' => $faker->boolean($changeOfGettingTrue = 50)
    ];
});

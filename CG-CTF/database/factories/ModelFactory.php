<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->unique()->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'api_token' => str_random(60)
    ];
});

$factory->define(\App\challenge::class, function (Faker\Generator $faker) {
    $type = ['Web', 'Re', 'Pwn', 'Crypto', 'Misc'];

    return [
        'title' => $faker->realText($maxNbChars = 20),
        'class' => $faker->randomElement($type),
        'description' => $faker->realText($maxNbChars = 100),
        'url' => $faker->url,
        'flag' => 1,
        'info' => $faker->realText($maxNbChars = 20),
        'score' => $faker->numberBetween($min = 1, $max = 100),
    ];
});

//$factory->define(\App\challenge::class, function (Faker\Generator $faker) {
//    return ['flag1' => $faker->sha256];
//});
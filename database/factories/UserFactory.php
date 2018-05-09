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
    return [
        'role' => 1, // admin
        'name' => 'Luís Fernando',
        'email' => 'fernando@harpiadev.com.br',
        'password' => bcrypt('123321a'), // secret
        'remember_token' => str_random(10),
    ];
});

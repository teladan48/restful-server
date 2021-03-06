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

$factory->define(App\Entities\User::class, function ($faker) {
    return [
        'name' => $faker->name,
        'email' => $email = strtolower($faker->email),
        'api_token' => password_hash($email, PASSWORD_BCRYPT),
    ];
});


$factory->define(App\Entities\UserLocation::class, function ($faker) {
    return [
        'location_lat' => $faker->latitude,
        'location_long' => $faker->longitude,
    ];
});

$factory->define(App\Entities\Event::class, function ($faker) {
    return [
        'name' => $faker->sentence(4),
        'event_date' => $faker->dateTimeBetween('-3 months', '+6 months'),
        'event_description' => $faker->text,
        'location' => $faker->address,
    ];
});

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

//User seeders
$factory->defineAs(fooCart\Core\User::class, 'admin', function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'role_id' => 3,
        'active' => true,
        'remember_token' => str_random(10),
    ];
});

$factory->defineAs(fooCart\Core\User::class, 'registered', function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'role_id' => 2,
        'active' => true,
        'remember_token' => str_random(10),
    ];
});

$factory->defineAs(fooCart\Core\User::class, 'guest', function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => 3 . '-' . uniqid() . '@foocart.dev',
        'password' => bcrypt(str_random(10)),
        'role_id' => 1,
        'active' => true,
        'remember_token' => str_random(10),
    ];
});

$factory->defineAs(fooCart\Core\User::class, 'inactive', function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'role_id' => 2,
        'active' => false,
        'remember_token' => str_random(10),
    ];
});

//Promo code seeders
$factory->defineAs(fooCart\Core\PromoCode::class, 'percentage', function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'type' => 'percentage',
        'discount_percent' => bcrypt(str_random(10)),
        'active_on' => str_random(10),
        'expires_on' => str_random(10),
    ];
});

$factory->defineAs(fooCart\Core\PromoCode::class, 'amount', function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'type' => 'amount',
        'discount_amount' => bcrypt(str_random(10)),
        'active_on' => str_random(10),
        'expires_on' => str_random(10),
    ];
});

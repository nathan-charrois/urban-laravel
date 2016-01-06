<?php
$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name'           => $faker->name,
        'email'          => $faker->email,
        'password'       => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Region::class, function (Faker\Generator $faker) {
    return [
        'user_id'     => factory('App\User')->create()->id,
        'street'      => $faker->streetAddress,
        'city'        => $faker->city,
        'zip'         => $faker->postcode,
        'state'       => $faker->state,
        'country'     => $faker->country,
        'price'       => $faker->numberBetween(1000, 5000000),
        'description' => $faker->paragraph(3),
    ];
});
<?php

use Faker\Generator as Faker;

$factory->define(App\Customer::class, function (Faker $faker) {
    return [
	    'firstname' => $faker->firstName(),
	    'lastname' => $faker->lastName(),
	    'email' => $faker->unique()->safeEmail,
	    'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
	    'street' => $faker->streetName(),
	    'housenum' => $faker->buildingNumber(),
	    'postcode' => $faker->postcode(),
	    'city' => $faker->city(),
	    'birthday' => $faker->date($format = 'Y-m-d', $max = '2010'),
    ];
});

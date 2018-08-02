<?php

use Faker\Generator as Faker;

$factory->define(App\Character::class, function (Faker $faker) {
	return [
		'name' => $faker->firstName(),
		'toddler' => '1',
	];
});

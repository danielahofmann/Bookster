<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
	    'name' => $faker->word(),
	    'price' => '10.95',
	    'description' => $faker->text($maxNbChars = 200),
	    'amount' => $faker->randomDigit,
	    'release' => $faker->date($format = 'Y-m-d'),
	    'genre_id' => $faker->randomNumber($min = 1, $max = 8),
	    'category_id' => $faker->randomNumber($min = 1, $max = 8),
	    'user_id' => function () {
		    return factory(App\User::class)->create()->id;
	    },
	    'author_id' => function () {
		    return factory(App\Author::class)->create()->id;
	    },
	    'character_id' => function () {
		    return factory(App\Character::class)->create()->id;
	    },
	    'bestseller' => $faker->randomNumber($min = 0, $max = 1),
    ];
});

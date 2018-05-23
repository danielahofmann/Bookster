<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
	    'name' => $faker->word(),
	    'price' => '10,95',
	    'description' => $faker->text($maxNbChars = 200),
	    'amount' => $faker->randomDigit,
	    'release' => $faker->date($format = 'Y-m-d'),
	    'genre_id' => '1',
	    'category_id' => '1',
	    'user_id' => function () {
		    return factory(App\User::class)->create()->id;
	    },
	    'author_id' => function () {
		    return factory(App\Author::class)->create()->id;
	    },
    ];
});

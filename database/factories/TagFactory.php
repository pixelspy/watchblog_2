<?php

use Faker\Generator as Faker;

$factory->define(App\Tag::class, function (Faker $faker) {
    return [
      'name' => $faker->word,
      'user_id' => $faker->randomDigit
    ];
});

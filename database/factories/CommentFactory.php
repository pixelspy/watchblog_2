<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
      'comment' => $faker->text(50),
      'article_id' => $faker->randomDigit,
      'user_id' => $faker->randomDigit

  ];
});

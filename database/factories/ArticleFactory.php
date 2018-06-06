<?php

use Faker\Generator as Faker;

// here is to format our fake data
$factory->define(App\Article::class, function (Faker $faker) {
    return [
        //
        'title' => $faker->text(50),
        'body' => $faker->text(200)
    ];
});

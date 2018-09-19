<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker, $u) {
    return  [
        'comment' => $faker->text(),
      ];
});

<?php

use Faker\Generator as Faker;
use App\Token;

$factory->define(Coupon::class, function (Faker $faker) {
    $code = new Token;

    return [
        'coupon' => $code->limit(6),
    ];
});

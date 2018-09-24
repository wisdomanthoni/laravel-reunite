<?php

use Faker\Generator as Faker;
use App\Token;
use App\Coupon;

$factory->define(Coupon::class, function (Faker $faker) {
    $code = new Token;
    return [
        'coupon' => $code->limit(6),
    ];
});

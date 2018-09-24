<?php

use Faker\Generator as Faker;
use App\Token;
use App\Coupon;

$factory->define(Coupon::class, function (Faker $faker) {
    $code = new Token;
    $string = 'November 1st';
    return [
        'coupon' => $code->limit(6),
        'expire' => date("Y-m-d H:i:s", strtotime($string)),
        
    ];
});

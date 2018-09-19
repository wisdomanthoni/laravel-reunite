<?php

use Faker\Generator as Faker;
use App\Country;


// dd($country->id);

$factory->define(App\Film::class, function (Faker $faker) {
    $country = Country::all()->random();
    return [
        'title' => $faker->sentence(5),
        'description' => $faker->text(),
        'release_date'  => $faker->date(),
        'rating' => rand(1,5),
        'price'  => rand(1500,10000),
        'country_id' => $country->id,
        'photo'  => 'https://via.placeholder.com/350x150',
        'slug'   => str_replace('--', '-', strtolower(preg_replace('/[^a-zA-Z0-9]/', '-', trim($faker->sentence(5))))),
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use Faker\Generator as Faker;


$factory->define(\App\Customer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'Address' => $faker->sentence,
    ];
});

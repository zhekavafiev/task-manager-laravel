<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Label;
use Faker\Generator as Faker;

$factory->define(Label::class, function (Faker $faker) {
    return [
        'text' => $faker->text(5, 7),
    ];
});

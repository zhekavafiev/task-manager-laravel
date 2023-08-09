<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\TaskStatus;
use Faker\Generator as Faker;

$factory->define(TaskStatus::class, function (Faker $faker) {
    return [
        'name' => $faker->lexify('??????')
    ];
});

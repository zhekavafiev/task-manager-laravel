<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Task;
use App\Model\TaskStatus;
use App\Model\User;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text(rand(60, 100)),
        'status_id' => TaskStatus::get()->pluck('id')->random(),
        'creator_by_id' => User::get()->pluck('id')->random(),
        'assigned_to_id' => User::get()->pluck('id')->random() ?? null,
    ];
});

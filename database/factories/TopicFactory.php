<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Topic;
use App\User;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Topic::class, function (Faker $faker) {
    $now = Carbon::now();

    return [
        'title' => $faker->realText(10),
        'user_id' => function() {
            return factory(User::class)->create()->id;
        },
        'created_at' => $faker->dateTimeThisYear,
        'updated_at' => $now,
    ];
});

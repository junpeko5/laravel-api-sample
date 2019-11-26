<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Like;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Like::class, function (Faker $faker) {
    $now = Carbon::now();

    return [
        'likeable_id' => function () {

        },
        'created_at' => $faker->dateTimeThisYear,
        'updated_at' => $now,
    ];
});

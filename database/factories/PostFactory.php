<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\Topic;
use App\User;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $now = Carbon::now();

    return [
        'body' => $faker->realText(200, 2),
        'topic_id' => function() {
            return factory(Topic::class)->create()->id;
        },
        'user_id' => function() {
            return factory(User::class)->create()->id;
        },
        'created_at' => $faker->dateTimeThisYear,
        'updated_at' => $now,
    ];
});

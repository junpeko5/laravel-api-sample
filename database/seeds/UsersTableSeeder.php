<?php

use App\Post;
use App\Topic;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 3)->create()->each(function ($user) {
            $user->topics()->saveMany(
                factory(Topic::class, 2)->make(['user_id' => null])
            )->each(function ($topic) {
                $topic->posts()->saveMany(
                    factory(Post::class, rand(0, 3))->make(['topic_id' => null])
                );
            });
        });
    }
}

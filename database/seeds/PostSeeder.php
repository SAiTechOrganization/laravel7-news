<?php

use App\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    const ITERATION_COUNT = 100;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < self::ITERATION_COUNT ; $i++)
        {
            Post::create([
                'title' => Str::random(10),
                'body'  => Str::random(30),
            ]);
        }
    }
}

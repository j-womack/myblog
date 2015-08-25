<?php

use Faker\Factory as Faker;

class PostsSeeder extends Seeder 
{


    public function run()
    {
        $faker = Faker::create();
        
        // Delete all existing posts
        // Post::truncate();

        $post = new Post();
        $post->user_id = 1;
        $post->title = "My First Post";
        $post->body = "This is my first post on my Laravel blog which I have made from scratch.";
        $post->save();

        $post1 = new Post();
        $post1->user_id = 1;
        $post1->title = "Post No. 2";
        $post1->body = "This is the post that is the second post.";
        $post1->save();

        for ($i = 0; $i < 300; $i++) {   
            $post3 = new Post();
            $post3->user_id = User::all()->random(1)->id;
            $post3->title = $faker->catchPhrase;
            $post3->body = $faker->bs;
            $post3->save();
        }

    }
}

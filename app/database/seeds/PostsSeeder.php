<?php

class PostsSeeder extends Seeder 
{


    public function run()
    {
        $post = new Post();
        $post->user_id = 1;
        $post->title = "First Post";
        $post->body = "This is the first post on my Laravel blog which I have made from scratch.";
        
        $post->save();
    }
}

<?php

class TagsSeeder extends Seeder 
{


    public function run()
    {
        $tag = new Tag();
        $tag->name = 'blog';
        $tag->save();
    }
}

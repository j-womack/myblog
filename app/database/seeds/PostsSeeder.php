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

        $post2 = new Post();
        $post2->user_id = 1;
        $post2->title = "Blogging is fun";
        $post2->body = "A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now. When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into the inner sanctuary, I throw myself down among the tall grass by the trickling stream; and, as I lie close to the earth, a thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath of that universal love which bears and sustains us, as it floats around us in an eternity of bliss; and then, my friend, when darkness overspreads my eyes, and heaven and earth seem to dwell in my soul and absorb its power, like the form of a beloved mistress, then I often think with longing, Oh, would I could describe these conceptions, could impress upon paper all that is living so full and warm within me, that it might be the mirror of my soul, as my soul is the mirror of the infinite God! O my friend -- but...";
        $post2->save();

        for ($i = 0; $i < 300; $i++) {   
            $post3 = new Post();
            $post3->user_id = User::all()->random(1)->id;
            $post3->title = $faker->catchPhrase;
            $post3->body = $faker->bs;
            $post3->save();
        }

        $post4 = new Post();
        $post4->user_id = 1;
        $post4->title = $faker->company;
        $post4->body = $faker->realText;
        $post4->save();

        $post5 = new Post();
        $post5->user_id = 1;
        $post5->title = $faker->name;
        $post5->body = $faker->text;
        $post5->save();

        $post6 = new Post();
        $post6->user_id = 1;
        $post6->title = $faker->address;
        $post6->body = $faker->bs;
        $post6->save();
    }
}

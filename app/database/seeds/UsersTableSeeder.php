<?php

use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder 
{
    public function run()
    {
        // User::truncate();
        $user = new User();
        $user->email = $_ENV['USER_EMAIL'];
        $user->password = $_ENV['USER_PASSWORD'];

        $user->save();

        
        $faker = Faker::create();

        for ($i = 0; $i < 5; $i++) {
            $user = new User();
            $user->email = $faker->email;
            $user->password = $faker->password;
            $user->save();
        }
    }
}
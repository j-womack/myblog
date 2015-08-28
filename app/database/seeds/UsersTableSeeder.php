<?php

class UsersTableSeeder extends Seeder 
{
    public function run()
    {
        $user = new User();
        $user->firstName = $_ENV['USER_FIRSTNAME'];
        $user->lastName = $_ENV['USER_LASTNAME'];
        $user->email = $_ENV['USER_EMAIL'];
        $user->password = $_ENV['USER_PASSWORD'];

        $user->save();
    }
}
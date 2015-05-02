<?php

use Illuminate\Database\Seeder;
use fooCart\src\User;

class UsersTableSeeder extends Seeder{

    public function run(){
        User::create(array(
            'name'          => 'Demo User Sr',
            'email'         => 'demo.user@justinc.me',
            'password'      =>  bcrypt('demo123'),
            'role'          =>  0,
            'active'        =>  true
        ));
        User::create(array(
            'name'          => 'Demo User Jr',
            'email'         => 'demo.user2@justinc.me',
            'password'      =>  bcrypt('demo123'),
            'role'          =>  0,
            'active'        =>  true
        ));
        User::create(array(
            'name'          => 'Demo User III',
            'email'         => 'demo.user3@justinc.me',
            'password'      =>  bcrypt('demo123'),
            'role'          =>  0,
            'active'        =>  true
        ));
    }
}
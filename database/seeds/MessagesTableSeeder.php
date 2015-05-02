<?php

use Illuminate\Database\Seeder;
use fooCart\src\Message;

class MessagesTableSeeder extends Seeder {

    public function run()
    {
        Message::create(array(
            'sender_name'  => 'John Smith',
            'sender_email' => 'jsmith@cart.dev',
            'sender_phone' => 1234567890,
            'message'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam metus nisi, mollis ac volutpat non, tempor sed odio. Donec pharetra, lectus id laoreet porta, velit ante lobortis dui, at faucibus dolor purus ac urna.',
            'read'       =>  true,
        ));
        Message::create(array(
            'sender_name'  => 'Jim Smith',
            'sender_email' => 'jim_smith@cart.dev',
            'sender_phone' => 1029384756,
            'message'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam metus nisi, mollis ac volutpat non, tempor sed odio. Donec pharetra, lectus id laoreet porta, velit ante lobortis dui, at faucibus dolor purus ac urna.',
            'read'       =>  false,
        ));
        Message::create(array(
            'sender_name'  => 'Jane Smith',
            'sender_email' => 'janesmith@cart.dev',
            'sender_phone' => 90987654321,
            'message'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam metus nisi, mollis ac volutpat non, tempor sed odio. Donec pharetra, lectus id laoreet porta, velit ante lobortis dui, at faucibus dolor purus ac urna.',
            'read'       =>  true,
        ));
    }

}
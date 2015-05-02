<?php

use Illuminate\Database\Seeder;
use fooCart\src\Customer;

class CustomersTableSeeder extends Seeder {

    public function run()
    {
        Customer::create(array(
            'first_name'     =>  'Justin',
            'last_name'      =>  'Christenson',
            'addr_street_1'  =>  '1234 Any St',
            'addr_street_2'  =>  'Apt B',
            'addr_city'      =>  'Vancouver',
            'addr_state'     =>  'WA',
            'addr_zip'       =>  98686,
            'home_phone'     =>  1234567890,
        ));
        Customer::create(array(
            'first_name'     =>  'Jane',
            'last_name'      =>  'Doe',
            'addr_street_1'  =>  '1234 My Ave',
            'addr_street_2'  =>  NULL,
            'addr_city'      =>  'Portland',
            'addr_state'     =>  'OR',
            'addr_zip'       =>  12345,
            'home_phone'     =>  5555555555,
        ));
        Customer::create(array(
            'first_name'     =>  'John',
            'last_name'      =>  'Doe',
            'addr_street_1'  =>  '4321 That St.',
            'addr_street_2'  =>  'Ste C.',
            'addr_city'      =>  'Portland',
            'addr_state'     =>  'OR',
            'addr_zip'       =>  13245,
            'home_phone'     =>  5555555554,
        ));
    }
}
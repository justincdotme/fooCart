<?php

use fooCart\Core\Models\Address;
use Illuminate\Database\Seeder;

class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $addresses = [
            [
                'user_id' => 2,
                'street_1' => '1234 Any St',
                'street_2' => null,
                'city' => 'Vancouver',
                'state_id' => 48,
                'zip' => 12345
            ],
            [
                'user_id' => 2,
                'street_1' => '1111 Test St',
                'street_2' => null,
                'city' => 'Seattle',
                'state_id' => 48,
                'zip' => 54321
            ],
            [
                'user_id' => 2,
                'street_1' => '1234 My Ave',
                'street_2' => 'Apt 2',
                'city' => 'Portland',
                'state_id' => 38,
                'zip' => 11111
            ],
        ];

        foreach ($addresses as $address) {
            Address::create($address);
        }
    }
}

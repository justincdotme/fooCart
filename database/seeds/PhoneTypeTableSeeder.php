<?php

use fooCart\Core\Models\PhoneType;
use Illuminate\Database\Seeder;

class PhoneTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $phoneTypes = [
            [
                'type' => 'Home'
            ],
            [
                'type' => 'Cell'
            ],
            [
                'type' => 'Work'
            ]
        ];

        foreach($phoneTypes as $phoneType) {
            PhoneType::create($phoneType);
        }
    }
}

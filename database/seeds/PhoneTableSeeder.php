<?php

use fooCart\Core\Models\Phone;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PhoneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $phoneNumbers = [
            [
                'user_id' => 1,
                'phone_type_id' => 1,
                'phone_number' => $faker->randomNumber(3, true) .
                    $faker->randomNumber(3, true) .
                    $faker->randomNumber(4, true) //Faker phoneNumber adds extensions
            ],
            [
                'user_id' => 1,
                'phone_type_id' => 2,
                'phone_number' => $faker->randomNumber(3, true) . //Faker phoneNumber adds extensions
                    $faker->randomNumber(3, true) .
                    $faker->randomNumber(4, true)
            ],
            [
                'user_id' => 1,
                'phone_type_id' => 3,
                'phone_number' => $faker->randomNumber(3, true) . //Faker phoneNumber adds extensions
                    $faker->randomNumber(3, true) .
                    $faker->randomNumber(4, true),
                'extension' => 4221
            ],
            [
                'user_id' => 2,
                'phone_type_id' => 1,
                'phone_number' => $faker->randomNumber(3, true) .//Faker phoneNumber adds extensions
                    $faker->randomNumber(3, true) .
                    $faker->randomNumber(4, true)
            ],
            [
                'user_id' => 2,
                'phone_type_id' => 2,
                'phone_number' => $faker->randomNumber(3, true) . //Faker phoneNumber adds extensions
                    $faker->randomNumber(3, true) .
                    $faker->randomNumber(4, true)
            ],
            [
                'user_id' => 2,
                'phone_type_id' => 3,
                'phone_number' => $faker->randomNumber(3, true) . //Faker phoneNumber adds extensions
                    $faker->randomNumber(3, true) .
                    $faker->randomNumber(4, true),
                'extension' => 622
            ],
        ];

        foreach($phoneNumbers as $phoneNumber) {
            Phone::create($phoneNumber);
        }
    }
}

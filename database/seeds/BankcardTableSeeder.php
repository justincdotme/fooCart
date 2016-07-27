<?php

use fooCart\Core\Models\Bankcard;
use Illuminate\Database\Seeder;

class BankcardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bankcards = [
            [
                'user_id' => 2,
                'stripe_id' => 'cus_8KGKz5mEh3eW1z'
            ],
            [
                'user_id' => 2,
                'stripe_id' => 'cus_8bElZG5ah3TY6x'
            ]
        ];

        foreach ($bankcards as $bankcard) {
            Bankcard::create($bankcard);
        }
    }
}

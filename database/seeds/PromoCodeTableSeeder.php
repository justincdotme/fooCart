<?php

use fooCart\Core\PromoCode;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PromoCodeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $amountPromoCodes = [
            [
                'name' => 'test amount 1',
                'type' => 'amount',
                'discount_amount' => 10.00,
                'active_on' => Carbon::today()->toDayDateTimeString(),
            ],
            [
                'name' => 'test amount 2',
                'type' => 'amount',
                'discount_amount' => 5.00,
                'active_on' => Carbon::today()->toDayDateTimeString(),
            ],
            [
                'name' => 'test amount 3',
                'type' => 'amount',
                'discount_amount' => 14.00,
                'active_on' => Carbon::today()->toDayDateTimeString(),
            ]
        ];

        foreach ($amountPromoCodes as $amountPromoCode) {
            PromoCode::create($amountPromoCode);
        }

        $percentagePromoCodes = [
            [
                'name' => 'test percentage 1',
                'type' => 'percentage',
                'discount_percent' => 0.10,
                'active_on' => Carbon::today()->toDayDateTimeString(),
            ],
            [
                'name' => 'test percentage 2',
                'type' => 'percentage',
                'discount_percent' => 0.15,
                'active_on' => Carbon::today()->toDayDateTimeString(),
            ],
            [
                'name' => 'test percentage 3',
                'type' => 'percentage',
                'discount_percent' => 0.50,
                'active_on' => Carbon::today()->toDayDateTimeString(),
            ],
        ];

        foreach ($percentagePromoCodes as $percentagePromoCode) {
            PromoCode::create($percentagePromoCode);
        }
    }
}

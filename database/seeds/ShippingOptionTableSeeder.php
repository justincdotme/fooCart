<?php

use Carbon\Carbon;
use fooCart\Core\ShippingOption;
use Illuminate\Database\Seeder;

class ShippingOptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shippingOptions = [
            //Demo USPS rates
            [
                'name' => 'USPS Priority Mail Express',
                'delivery_time' => 'Overnight',
                'active_on' => Carbon::today()->toDayDateTimeString(),
                'expires_on' => null
            ],
[
                'name' => 'USPS Priority Mail',
                'delivery_time' => '1-3 Business Days',
                'active_on' => Carbon::today()->toDayDateTimeString(),
                'expires_on' => null
            ],
[
                'name' => 'USPS Retail Ground',
                'delivery_time' => '2-8 Business Days',
                'active_on' => Carbon::today()->toDayDateTimeString(),
                'expires_on' => null
            ],
            //Demo USPS rates
            [
                'name' => 'UPS UPS Next Day Air Saver',
                'delivery_time' => 'Overnight',
                'active_on' => Carbon::today()->toDayDateTimeString(),
                'expires_on' => null
            ],
            [
                'name' => 'UPS 2nd Day Air',
                'delivery_time' => '2 Business Days',
                'active_on' => Carbon::today()->toDayDateTimeString(),
                'expires_on' => null
            ],
            [
                'name' => 'UPS Ground',
                'delivery_time' => '1-5 Business Days',
                'active_on' => Carbon::today()->toDayDateTimeString(),
                'expires_on' => null
            ],
        ];

        foreach ($shippingOptions as $shippingOption) {
            ShippingOption::create($shippingOption);
        }
    }
}

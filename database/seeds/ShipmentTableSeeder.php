<?php

use Carbon\Carbon;
use fooCart\Core\Shipment;
use Illuminate\Database\Seeder;

class ShipmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shipments = [
            [
                'invoice_id' => 1,
                'shipping_option_id' => 2,
                'shipping_address_id' => 1,
                'shipping_cost' => 26.22,
                'tracking_number' => '9400 1000 0000 0000 0000 00',
                'shipped_on' => Carbon::today()->toDayDateTimeString(),
            ],
            [
                'invoice_id' => 1,
                'shipping_option_id' => 1,
                'shipping_address_id' => 2,
                'shipping_cost' => 78.12,
                'tracking_number' => '9410 1000 0000 0000 0000 00',
                'shipped_on' => Carbon::today()->toDayDateTimeString(),
            ],
            [
                'invoice_id' => 2,
                'shipping_option_id' => 3,
                'shipping_address_id' => 1,
                'shipping_cost' => 26.22,
                'tracking_number' => '9420 1000 0000 0000 0000 00',
                'shipped_on' => Carbon::today()->toDayDateTimeString(),
            ],
            [
                'invoice_id' => 3,
                'shipping_option_id' => 1,
                'shipping_address_id' => 1,
                'shipping_cost' => 66.21,
                'tracking_number' => '9430 1000 0000 0000 0000 00',
                'shipped_on' => Carbon::today()->toDayDateTimeString(),
            ],
            [
                'invoice_id' => 3,
                'shipping_option_id' => 2,
                'shipping_address_id' => 1,
                'shipping_cost' => 18.26,
                'tracking_number' => '9440 1000 0000 0000 0000 00',
                'shipped_on' => Carbon::today()->toDayDateTimeString(),
            ],
        ];

        foreach ($shipments as $shipment) {
            Shipment::create($shipment);
        }
    }
}

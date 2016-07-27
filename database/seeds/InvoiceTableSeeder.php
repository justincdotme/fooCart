<?php

use Carbon\Carbon;
use fooCart\Core\Models\Invoice;
use Illuminate\Database\Seeder;

class InvoiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $invoices = [
            [
                'user_id' => 2,
                'status_id' => 1,
                'completed_on' => Carbon::today()->toDayDateTimeString(),
                'bankcard_id' => 1,
                'promo_code_id' => 2
            ],
            [
                'user_id' => 2,
                'status_id' => 1,
                'completed_on' => Carbon::today()->toDayDateTimeString(),
                'bankcard_id' => 1,
                'promo_code_id' => null
            ],
            [
                'user_id' => 2,
                'status_id' => 1,
                'completed_on' => Carbon::today()->toDayDateTimeString(),
                'bankcard_id' => 2,
                'promo_code_id' => 4
            ],

        ];

        foreach ($invoices as $invoice) {
            Invoice::create($invoice);
        }
    }
}

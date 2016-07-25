<?php

use fooCart\Core\InvoiceStatus;
use Illuminate\Database\Seeder;

class InvoiceStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $invoiceStatuses = [
            [
                'status' => 'shipped', //The entire invoice has been shipped
            ],
            [
                'status' => 'processing', //The invoice is being processed (packaging, partially shipped)
            ],
            [
                'status' => 'incomplete', //The user started the invoice, but did not complete it.
            ],
            [
                'status' => 'paid', //The bankcard was successfully charged
            ],
            [
                'status' => 'error', //An error has occurred (bad bankcard, out of stock, etc)
            ],
            [
                'status' => 'cancelled', //The invoice was cancelled
            ]
        ];

        foreach ($invoiceStatuses as $status) {
            InvoiceStatus::create($status);
        }
    }
}

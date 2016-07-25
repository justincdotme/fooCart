<?php

use fooCart\Core\InvoiceItemType;
use Illuminate\Database\Seeder;

class InvoiceItemTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $invoiceTypes = [
            [
                'type' => 'product'
            ],
            [
                'type' => 'line item'
            ],
            [
                'type' => 'override'
            ]
        ];

        foreach ($invoiceTypes as $invoiceType) {
            InvoiceItemType::create($invoiceType);
        }
    }
}

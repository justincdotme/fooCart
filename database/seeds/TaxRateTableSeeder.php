<?php

use fooCart\Core\TaxRate;
use Illuminate\Database\Seeder;

class TaxRateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $taxRates = [
            [
                'rate' => 0.028
            ],
            [
                'rate' => 0.016
            ],
            [
                'rate' => 0.019
            ],
        ];

        foreach($taxRates as $taxRate) {
            TaxRate::create($taxRate);
        }
    }
}

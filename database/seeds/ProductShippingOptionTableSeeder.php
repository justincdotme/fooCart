<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductShippingOptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productShippingOptions = [
            //product 1
            [
                'product_id' => 1,
                'shipping_option_id' => 1,
                'shipping_cost' => 26.16,
            ],
            [
                'product_id' => 1,
                'shipping_option_id' => 2,
                'shipping_cost' => 11.16,
            ],
            [
                'product_id' => 1,
                'shipping_option_id' => 3,
                'shipping_cost' => 34.00,
            ],
            [
                'product_id' => 1,
                'shipping_option_id' => 6,
                'shipping_cost' => 19.00,
            ],
            //product 2
            [
                'product_id' => 2,
                'shipping_option_id' => 1,
                'shipping_cost' => 20.16,
            ],
            [
                'product_id' => 2,
                'shipping_option_id' => 2,
                'shipping_cost' => 16.16,
            ],
            [
                'product_id' => 2,
                'shipping_option_id' => 3,
                'shipping_cost' => 31.00,
            ],
            //product 3
            [
                'product_id' => 3,
                'shipping_option_id' => 4,
                'shipping_cost' => 40.16,
            ],
            [
                'product_id' => 3,
                'shipping_option_id' => 5,
                'shipping_cost' => 18.16,
            ],
            [
                'product_id' => 3,
                'shipping_option_id' => 6,
                'shipping_cost' => 28.00,
            ],
            //product 4
            [
                'product_id' => 4,
                'shipping_option_id' => 1,
                'shipping_cost' => 22.16,
            ],
            [
                'product_id' => 4,
                'shipping_option_id' => 2,
                'shipping_cost' => 17.16,
            ],
            [
                'product_id' => 4,
                'shipping_option_id' => 4,
                'shipping_cost' => 22.16,
            ],
            [
                'product_id' => 4,
                'shipping_option_id' => 5,
                'shipping_cost' => 16.16,
            ],
            [
                'product_id' => 4,
                'shipping_option_id' => 6,
                'shipping_cost' => 36.00,
            ],
        ];

        foreach ($productShippingOptions as $productShippingOption) {
            DB::table('product_shipping_options')->insert($productShippingOption);
        }
    }
}

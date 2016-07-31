<?php

use Carbon\Carbon;
use fooCart\Core\Models\Product;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        /**
         * Optional fields
         * sale_price
         * weight
         *
         */
        $products = [
            [
                'name' => $faker->word,
                'short_desc' => $faker->text(110),
                'long_desc' => $faker->text(600),
                'sku' => 'FC000000001',
                'unit_price' => 200.00,
                'weight' => rand(40, 250),
                'weight_measurement' => 'lbs',
                'manufacturer_id' => rand(1,6),
                'units_sold' => 0,
                'units_available' => 10,
                'active_on' => Carbon::today()->toDayDateTimeString(),
            ],
            [
                'name' => $faker->word,
                'short_desc' => $faker->text(110),
                'long_desc' => $faker->text(600),
                'sku' => 'FC000000002',
                'unit_price' => 200.00,
                'sale_price' => 180.99,
                'weight' => rand(40, 250),
                'weight_measurement' => 'lbs',
                'manufacturer_id' => rand(1,6),
                'units_sold' => 0,
                'units_available' => 10,
                'active_on' => Carbon::today()->toDayDateTimeString(),
            ],
            [
                'name' => $faker->word,
                'short_desc' => $faker->text(110),
                'long_desc' => $faker->text(600),
                'sku' => 'FC000000003',
                'unit_price' => 310.00,
                'weight' => rand(40, 250),
                'weight_measurement' => 'lbs',
                'manufacturer_id' => rand(1,6),
                'units_sold' => 0,
                'units_available' => 10,
                'active_on' => Carbon::yesterday()->toDayDateTimeString(),
                'expires_on' => Carbon::yesterday()->toDayDateTimeString(),
            ],
            [
                'name' => $faker->word,
                'short_desc' => $faker->text(110),
                'long_desc' => $faker->text(600),
                'sku' => 'FC000000004',
                'unit_price' => 180.00,
                'weight' => rand(40, 250),
                'weight_measurement' => 'lbs',
                'manufacturer_id' => rand(1,6),
                'units_sold' => 0,
                'units_available' => 10,
                'active_on' => Carbon::yesterday()->toDayDateTimeString(),
                'expires_on' => Carbon::now()->addDays(7)->toDayDateTimeString(),
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}

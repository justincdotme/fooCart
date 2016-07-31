<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productCategories = [
            [
                'product_id' => 1,
                'category_id' => 1
            ],
            [
                'product_id' => 1,
                'category_id' => 2
            ],
            [
                'product_id' => 2,
                'category_id' => 1
            ],
            [
                'product_id' => 3,
                'category_id' => 2
            ],
            [
                'product_id' => 4,
                'category_id' => 3
            ],
            [
                'product_id' => 4,
                'category_id' => 4
            ],
        ];

        foreach ($productCategories as $productCategory) {
            DB::table('product_categories')->insert($productCategory);
        }
    }
}

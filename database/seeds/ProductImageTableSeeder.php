<?php

use fooCart\Core\Models\ProductImage;
use Illuminate\Database\Seeder;

class ProductImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productImages =  [
            [
                'product_id'  => 1,
                'full_path'  => '/images/product-images/1-553bf9d2468c1.jpg',
                'thumb_path'  => '/images/product-images/1-553bf9d2468c1.jpg',
                'sequence' => 1
            ],
            [
                'product_id'  => 1,
                'full_path'  => '/images/product-images/1-553bf9f74665f.jpg',
                'thumb_path'  => '/images/product-images/1-553bf9f74665f.jpg',
                'sequence' => 2
            ],
            [
                'product_id'  => 2,
                'full_path'  => '/images/product-images/2-553bf9d2468c1.jpg',
                'thumb_path'  => '/images/product-images/2-553bf9d2468c1.jpg',
                'sequence' => 1
            ],
            [
                'product_id'  => 2,
                'full_path'  => '/images/product-images/2-553bf9f74665f.jpg',
                'thumb_path'  => '/images/product-images/2-553bf9f74665f.jpg',
                'sequence' => 2
            ],
            [
                'product_id'  => 3,
                'full_path'  => '/images/product-images/3-553bf9d2468c1.jpg',
                'thumb_path'  => '/images/product-images/3-553bf9d2468c1.jpg',
                'sequence' => 1
            ],
            [
                'product_id'  => 3,
                'full_path'  => '/images/product-images/3-553bf9f74665f.jpg',
                'thumb_path'  => '/images/product-images/3-553bf9f74665f.jpg',
                'sequence' => 2
            ],
            [
                'product_id'  => 4,
                'full_path'  => '/images/product-images/4-553bf9d2468c1.jpg',
                'thumb_path'  => '/images/product-images/4-553bf9d2468c1.jpg',
                'sequence' => 1
            ],
            [
                'product_id'  => 4,
                'full_path'  => '/images/product-images/4-553bf9f74665f.jpg',
                'thumb_path'  => '/images/product-images/4-553bf9f74665f.jpg',
                'sequence' => 2
            ]
        ];

        foreach($productImages as $productImage) {
            ProductImage::create($productImage);
        }

    }
}

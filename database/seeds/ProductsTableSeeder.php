<?php

use Illuminate\Database\Seeder;
use fooCart\src\Product;

class ProductsTableSeeder extends Seeder {

    public function run()
    {
        //Standard seeder
        Product::create(array(
            'sku'               => 'FC-HDTV00000001',
            'manufacturer_id'   => 1,
            'category_id'       => 1,
            'name'              => '27" HD Television',
            'price'             => 320.00,
            'short_desc'        => 'Short description of product goes here.',
            'long_desc'         => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price'        => NULL,
            'shipping_cost'     => 22.16,
            'units_sold'        => 12,
            'number_available'  => 28,
            'tax_id'            => 1,
            'active'            => true
        ));
        Product::create(array(
            'sku'               => 'FC-HDTV00000002',
            'manufacturer_id'   =>  2,
            'category_id'       =>  1,
            'name'              => '32" HD Television',
            'price'             => 459.99,
            'short_desc'        => 'Short description of product goes here.',
            'long_desc'         => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price'        => NULL,
            'shipping_cost'     => 34.16,
            'units_sold'        => 2,
            'number_available'  => 7,
            'tax_id'            => 1,
            'active'            => true
        ));
        Product::create(array(
            'sku'               => 'FC-HDTV00000003',
            'manufacturer_id'   => 3,
            'category_id'       => 1,
            'name'              => '52" HD Television',
            'price'             => 288.99,
            'short_desc'        => 'Short description of product goes here.',
            'long_desc'         => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price'        => NULL,
            'shipping_cost'     => 21.47,
            'units_sold'        => 29,
            'number_available'  => 3,
            'tax_id'            => 1,
            'active'            => true
        ));
        Product::create(array(
            'sku'               => 'FC-HDTV00000004',
            'manufacturer_id'   => 4,
            'category_id'       => 1,
            'name'              => '22" HD Television',
            'price'             => 320.00,
            'short_desc'        => 'Short description of product goes here.',
            'long_desc'         => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price'        => 290.00,
            'shipping_cost'     => 22.16,
            'units_sold'        => 12,
            'number_available'  => 28,
            'tax_id'            => 1,
            'active'            => true
        ));
        Product::create(array(
            'sku'               => 'FC-HDTV00000005',
            'manufacturer_id'   => 5,
            'category_id'       => 1,
            'name'              => '32" HD Television',
            'price'             => 459.99,
            'short_desc'        => 'Short description of product goes here.',
            'long_desc'         => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price'        => 400.00,
            'shipping_cost'     => 34.16,
            'units_sold'        => 2,
            'number_available'  => 7,
            'tax_id'            => 2,
            'active'            => true
        ));
        Product::create(array(
            'sku'               => 'FC-HDTV00000006',
            'manufacturer_id'   => 6,
            'category_id'       => 1,
            'name'              => '27" HD Television',
            'price'             => 320.00,
            'short_desc'        => 'Short description of product goes here.',
            'long_desc'         => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price'        => NULL,
            'shipping_cost'     => 22.16,
            'units_sold'        => 12,
            'number_available'  => 28,
            'tax_id'            => 1,
            'active'            => true
        ));
        Product::create(array(
            'sku'               => 'FC-HDTV00000007',
            'manufacturer_id'   =>  6,
            'category_id'       =>  1,
            'name'              => '32" HD Television',
            'price'             => 459.99,
            'short_desc'        => 'Short description of product goes here.',
            'long_desc'         => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price'        => NULL,
            'shipping_cost'     => 34.16,
            'units_sold'        => 2,
            'number_available'  => 7,
            'tax_id'            => 1,
            'active'            => true
        ));
        Product::create(array(
            'sku'               => 'FC-HDTV00000008',
            'manufacturer_id'   => 4,
            'category_id'       => 1,
            'name'              => '52" HD Television',
            'price'             => 288.99,
            'short_desc'        => 'Short description of product goes here.',
            'long_desc'         => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price'        => NULL,
            'shipping_cost'     => 21.47,
            'units_sold'        => 29,
            'number_available'  => 3,
            'tax_id'            => 1,
            'active'            => true
        ));
        Product::create(array(
            'sku'               => 'FC-HDTV00000009',
            'manufacturer_id'   => 3,
            'category_id'       => 1,
            'name'              => '22" HD Television',
            'price'             => 320.00,
            'short_desc'        => 'Short description of product goes here.',
            'long_desc'         => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price'        => 290.00,
            'shipping_cost'     => 22.16,
            'units_sold'        => 12,
            'number_available'  => 28,
            'tax_id'            => 1,
            'active'            => true
        ));
        Product::create(array(
            'sku'               => 'FC-HDTV00000010',
            'manufacturer_id'   => 2,
            'category_id'       => 1,
            'name'              => '32" HD Television',
            'price'             => 459.99,
            'short_desc'        => 'Short description of product goes here.',
            'long_desc'         => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price'        => null,
            'shipping_cost'     => 34.16,
            'units_sold'        => 2,
            'number_available'  => 7,
            'tax_id'            => 2,
            'active'            => true
        ));
        Product::create(array(
            'sku'               => 'FC-COMP00000001',
            'manufacturer_id'   => 6,
            'category_id'       => 4,
            'name'              => 'HAL 9000',
            'price'             => 750.99,
            'short_desc'        => 'Short description of product goes here.',
            'long_desc'         => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price'        => null,
            'shipping_cost'     => 32.15,
            'units_sold'        => 27,
            'number_available'  => 61,
            'tax_id'            => 1,
            'active'            => true
        ));
        Product::create(array(
            'sku'               => 'FC-COMP00000002',
            'manufacturer_id'   => 5,
            'category_id'       => 4,
            'name'              => 'Bates 9000',
            'price'             => 1750.99,
            'short_desc'        => 'Short description of product goes here.',
            'long_desc'         => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price'        => 1750.00,
            'shipping_cost'     => 62.15,
            'units_sold'        => 1,
            'number_available'  => 2,
            'tax_id'            => 1,
            'active'            => true
        ));
        Product::create(array(
            'sku'               => 'FC-COMP00000003',
            'manufacturer_id'   => 4,
            'category_id'       => 4,
            'name'              => 'Vi',
            'price'             => 1250.99,
            'short_desc'        => 'Short description of product goes here.',
            'long_desc'         => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price'        => null,
            'shipping_cost'     => 12.15,
            'units_sold'        => 3,
            'number_available'  => 8,
            'tax_id'            => 1,
            'active'            => true
        ));
        Product::create(array(
            'sku'               => 'FC-COMP00000004',
            'manufacturer_id'   => 3,
            'category_id'       => 4,
            'name'              => 'Gibson Server',
            'price'             => 27050.99,
            'short_desc'        => 'Short description of product goes here.',
            'long_desc'         => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price'        => null,
            'shipping_cost'     => 162.15,
            'units_sold'        => 3,
            'number_available'  => 8,
            'tax_id'            => 1,
            'active'            => true
        ));
        Product::create(array(
            'sku'               => 'FC-COMP00000005',
            'manufacturer_id'   => 2,
            'category_id'       => 4,
            'name'              => 'ChiChi 3000',
            'price'             => 870.99,
            'short_desc'        => 'Short description of product goes here.',
            'long_desc'         => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price'        => 800.00,
            'shipping_cost'     => 162.15,
            'units_sold'        => 3,
            'number_available'  => 8,
            'tax_id'            => 1,
            'active'            => true
        ));
        Product::create(array(
            'sku'               => 'FC-COMP00000006',
            'manufacturer_id'   => 3,
            'category_id'       => 4,
            'name'              => 'Huxley 600',
            'price'             => 999.99,
            'short_desc'        => 'Short description of product goes here.',
            'long_desc'         => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price'        => null,
            'shipping_cost'     => 32.15,
            'units_sold'        => 27,
            'number_available'  => 61,
            'tax_id'            => 1,
            'active'            => true
        ));
        Product::create(array(
            'sku'               => 'FC-COMP00000007',
            'manufacturer_id'   => 3,
            'category_id'       => 4,
            'name'              => 'WOPR',
            'price'             => 1750.99,
            'short_desc'        => 'Short description of product goes here.',
            'long_desc'         => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price'        => 1710.00,
            'shipping_cost'     => 62.15,
            'units_sold'        => 1,
            'number_available'  => 2,
            'tax_id'            => 1,
            'active'            => true
        ));
        Product::create(array(
            'sku'               => 'FC-COMP00000008',
            'manufacturer_id'   => 3,
            'category_id'       => 4,
            'name'              => 'MU-TH-R 182',
            'price'             => 1390.99,
            'short_desc'        => 'Short description of product goes here.',
            'long_desc'         => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price'        => null,
            'shipping_cost'     => 12.15,
            'units_sold'        => 3,
            'number_available'  => 8,
            'tax_id'            => 1,
            'active'            => true
        ));
        Product::create(array(
            'sku'               => 'FC-COMP00000009',
            'manufacturer_id'   => 2,
            'category_id'       => 4,
            'name'              => 'V.I.K.I.',
            'price'             => 2050.99,
            'short_desc'        => 'Short description of product goes here.',
            'long_desc'         => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price'        => null,
            'shipping_cost'     => 162.15,
            'units_sold'        => 3,
            'number_available'  => 8,
            'tax_id'            => 1,
            'active'            => true
        ));
        Product::create(array(
            'sku'               => 'FC-COMP00000010',
            'manufacturer_id'   => 1,
            'category_id'       => 4,
            'name'              => 'Project 2501',
            'price'             => 862.99,
            'short_desc'        => 'Short description of product goes here.',
            'long_desc'         => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price'        => 800.00,
            'shipping_cost'     => 162.15,
            'units_sold'        => 3,
            'number_available'  => 8,
            'tax_id'            => 1,
            'active'            => true
        ));
        Product::create(array(
            'sku'               => 'FC-MOBI00000001',
            'manufacturer_id'   => 1,
            'category_id'       => 2,
            'name'              => 'X-DNA 2',
            'price'             => 645.99,
            'short_desc'        => 'Short description of product goes here.',
            'long_desc'         => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price'        => 600.00,
            'shipping_cost'     => 12.00,
            'units_sold'        => 1,
            'number_available'  => 4,
            'tax_id'            => 3,
            'active'            => true
        ));
        Product::create(array(
            'sku'               => 'FC-MOBI00000002',
            'manufacturer_id'   => 2,
            'category_id'       => 2,
            'name'              => 'Eclipse',
            'price'             => 129.99,
            'short_desc'        => 'Short description of product goes here.',
            'long_desc'         => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price'        => null,
            'shipping_cost'     => 4.15,
            'units_sold'        => 1,
            'number_available'  => 4,
            'tax_id'            => 3,
            'active'            => true
        ));
        Product::create(array(
            'sku'               => 'FC-MOBI00000003',
            'manufacturer_id'   => 3,
            'category_id'       => 2,
            'name'              => 'Universe X-71',
            'price'             => 422.99,
            'short_desc'        => 'Short description of product goes here.',
            'long_desc'         => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price'        => null,
            'shipping_cost'     => 14.15,
            'units_sold'        => 1,
            'number_available'  => 4,
            'tax_id'            => 3,
            'active'            => true
        ));
        Product::create(array(
            'sku'               => 'FC-MOBI00000004',
            'manufacturer_id'   => 4,
            'category_id'       => 2,
            'name'              => 'Orion III',
            'price'             => 721.99,
            'short_desc'        => 'Short description of product goes here.',
            'long_desc'         => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price'        => 699.99,
            'shipping_cost'     => 11.15,
            'units_sold'        => 1,
            'number_available'  => 4,
            'tax_id'            => 3,
            'active'            => true
        ));
        Product::create(array(
            'sku'               => 'FC-MOBI00000005',
            'manufacturer_id'   => 5,
            'category_id'       => 2,
            'name'              => 'Aries Ib',
            'price'             => 643.99,
            'short_desc'        => 'Short description of product goes here.',
            'long_desc'         => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price'        => 619.99,
            'shipping_cost'     => 11.15,
            'units_sold'        => 1,
            'number_available'  => 4,
            'tax_id'            => 3,
            'active'            => true
        ));
        Product::create(array(
            'sku'               => 'FC-MOBI00000006',
            'manufacturer_id'   => 6,
            'category_id'       => 2,
            'name'              => 'XD-1',
            'price'             => 417.99,
            'short_desc'        => 'Short description of product goes here.',
            'long_desc'         => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price'        => null,
            'shipping_cost'     => 11.15,
            'units_sold'        => 1,
            'number_available'  => 4,
            'tax_id'            => 3,
            'active'            => true
        ));
        Product::create(array(
            'sku'               => 'FC-MOBI00000007',
            'manufacturer_id'   => 3,
            'category_id'       => 2,
            'name'              => 'Axiom',
            'price'             => 400.99,
            'short_desc'        => 'Short description of product goes here.',
            'long_desc'         => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price'        => null,
            'shipping_cost'     => 7.15,
            'units_sold'        => 11,
            'number_available'  => 12,
            'tax_id'            => 3,
            'active'            => true
        ));
        Product::create(array(
            'sku'               => 'FC-MOBI00000008',
            'manufacturer_id'   => 3,
            'category_id'       => 2,
            'name'              => 'T-16 Bullseye',
            'price'             => 734.99,
            'short_desc'        => 'Short description of product goes here.',
            'long_desc'         => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price'        => 699.99,
            'shipping_cost'     => 6.15,
            'units_sold'        => 13,
            'number_available'  => 4,
            'tax_id'            => 3,
            'active'            => true
        ));
        Product::create(array(
            'sku'               => 'FC-MOBI00000009',
            'manufacturer_id'   => 1,
            'category_id'       => 2,
            'name'              => 'ETA-2 Actis',
            'price'             => 712.99,
            'short_desc'        => 'Short description of product goes here.',
            'long_desc'         => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price'        => null,
            'shipping_cost'     => 17.15,
            'units_sold'        => 65,
            'number_available'  => 66,
            'tax_id'            => 3,
            'active'            => true
        ));
        Product::create(array(
            'sku'               => 'FC-MOBI00000010',
            'manufacturer_id'   => 4,
            'category_id'       => 2,
            'name'              => 'C-3PO',
            'price'             => 799.99,
            'short_desc'        => 'Short description of product goes here.',
            'long_desc'         => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price'        => null,
            'shipping_cost'     => 17.15,
            'units_sold'        => 2,
            'number_available'  => 14,
            'tax_id'            => 3,
            'active'            => true
        ));
    }
}
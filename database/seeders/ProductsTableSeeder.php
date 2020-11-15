<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'sku' => 'FC-HDTV00000001',
            'manufacturer_id' => 1,
            'name' => '27" HD Television',
            'unit_price' => 320.00,
            'short_desc' => 'Short description of product goes here.',
            'long_desc' => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price' => NULL,
            'units_available' => 28,
            'active' => true
        ]);
        Product::create([
            'sku' => 'FC-HDTV00000002',
            'manufacturer_id' => 2,
            'name' => '32" HD Television',
            'unit_price' => 459.99,
            'short_desc' => 'Short description of product goes here.',
            'long_desc' => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price' => NULL,
            'units_available' => 7,
            'active' => true
        ]);
        Product::create([
            'sku' => 'FC-HDTV00000003',
            'manufacturer_id' => 3,
            'name' => '52" HD Television',
            'unit_price' => 288.99,
            'short_desc' => 'Short description of product goes here.',
            'long_desc' => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price' => NULL,
            'units_available' => 3,
            'active' => true
        ]);
        Product::create([
            'sku' => 'FC-HDTV00000004',
            'manufacturer_id' => 4,
            'name' => '22" HD Television',
            'unit_price' => 320.00,
            'short_desc' => 'Short description of product goes here.',
            'long_desc' => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price' => 290.00,
            'units_available' => 28,
            'active' => true
        ]);
        Product::create([
            'sku' => 'FC-HDTV00000005',
            'manufacturer_id' => 5,
            'name' => '32" HD Television',
            'unit_price' => 459.99,
            'short_desc' => 'Short description of product goes here.',
            'long_desc' => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price' => 400.00,
            'units_available' => 7,
            'active' => true
        ]);
        Product::create([
            'sku' => 'FC-HDTV00000006',
            'manufacturer_id' => 6,
            'name' => '27" HD Television',
            'unit_price' => 320.00,
            'short_desc' => 'Short description of product goes here.',
            'long_desc' => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price' => NULL,
            'units_available' => 28,
            'active' => true
        ]);
        Product::create([
            'sku' => 'FC-HDTV00000007',
            'manufacturer_id' => 6,
            'name' => '32" HD Television',
            'unit_price' => 459.99,
            'short_desc' => 'Short description of product goes here.',
            'long_desc' => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price' => NULL,
            'units_available' => 7,
            'active' => true
        ]);
        Product::create([
            'sku' => 'FC-HDTV00000008',
            'manufacturer_id' => 4,
            'name' => '52" HD Television',
            'unit_price' => 288.99,
            'short_desc' => 'Short description of product goes here.',
            'long_desc' => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price' => NULL,
            'units_available' => 3,
            'active' => true
        ]);
        Product::create([
            'sku' => 'FC-HDTV00000009',
            'manufacturer_id' => 3,
            'name' => '22" HD Television',
            'unit_price' => 320.00,
            'short_desc' => 'Short description of product goes here.',
            'long_desc' => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price' => 290.00,
            'units_available' => 28,
            'active' => true
        ]);
        Product::create([
            'sku' => 'FC-HDTV00000010',
            'manufacturer_id' => 2,
            'name' => '32" HD Television',
            'unit_price' => 459.99,
            'short_desc' => 'Short description of product goes here.',
            'long_desc' => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price' => null,
            'units_available' => 7,
            'active' => true
        ]);
        Product::create([
            'sku' => 'FC-COMP00000001',
            'manufacturer_id' => 6,
            'name' => 'HAL 9000',
            'unit_price' => 750.99,
            'short_desc' => 'Short description of product goes here.',
            'long_desc' => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price' => null,
            'units_available' => 61,
            'active' => true
        ]);
        Product::create([
            'sku' => 'FC-COMP00000002',
            'manufacturer_id' => 5,
            'name' => 'Bates 9000',
            'unit_price' => 1750.99,
            'short_desc' => 'Short description of product goes here.',
            'long_desc' => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price' => 1750.00,
            'units_available' => 2,
            'active' => true
        ]);
        Product::create([
            'sku' => 'FC-COMP00000003',
            'manufacturer_id' => 4,
            'name' => 'Vi',
            'unit_price' => 1250.99,
            'short_desc' => 'Short description of product goes here.',
            'long_desc' => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price' => null,
            'units_available' => 8,
            'active' => true
        ]);
        Product::create([
            'sku' => 'FC-COMP00000004',
            'manufacturer_id' => 3,
            'name' => 'Gibson Server',
            'unit_price' => 27050.99,
            'short_desc' => 'Short description of product goes here.',
            'long_desc' => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price' => null,
            'units_available' => 8,
            'active' => true
        ]);
        Product::create([
            'sku' => 'FC-COMP00000005',
            'manufacturer_id' => 2,
            'name' => 'ChiChi 3000',
            'unit_price' => 870.99,
            'short_desc' => 'Short description of product goes here.',
            'long_desc' => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price' => 800.00,
            'units_available' => 8,
            'active' => true
        ]);
        Product::create([
            'sku' => 'FC-COMP00000006',
            'manufacturer_id' => 3,
            'name' => 'Huxley 600',
            'unit_price' => 999.99,
            'short_desc' => 'Short description of product goes here.',
            'long_desc' => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price' => null,
            'units_available' => 61,
            'active' => true
        ]);
        Product::create([
            'sku' => 'FC-COMP00000007',
            'manufacturer_id' => 3,
            'name' => 'WOPR',
            'unit_price' => 1750.99,
            'short_desc' => 'Short description of product goes here.',
            'long_desc' => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price' => 1710.00,
            'units_available' => 2,
            'active' => true
        ]);
        Product::create([
            'sku' => 'FC-COMP00000008',
            'manufacturer_id' => 3,
            'name' => 'MU-TH-R 182',
            'unit_price' => 1390.99,
            'short_desc' => 'Short description of product goes here.',
            'long_desc' => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price' => null,
            'units_available' => 8,
            'active' => true
        ]);
        Product::create([
            'sku' => 'FC-COMP00000009',
            'manufacturer_id' => 2,
            'name' => 'V.I.K.I.',
            'unit_price' => 2050.99,
            'short_desc' => 'Short description of product goes here.',
            'long_desc' => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price' => null,
            'units_available' => 8,
            'active' => true
        ]);
        Product::create([
            'sku' => 'FC-COMP00000010',
            'manufacturer_id' => 1,
            'name' => 'Project 2501',
            'unit_price' => 862.99,
            'short_desc' => 'Short description of product goes here.',
            'long_desc' => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price' => 800.00,
            'units_available' => 8,
            'active' => true
        ]);
        Product::create([
            'sku' => 'FC-MOBI00000001',
            'manufacturer_id' => 1,
            'name' => 'X-DNA 2',
            'unit_price' => 645.99,
            'short_desc' => 'Short description of product goes here.',
            'long_desc' => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price' => 600.00,
            'units_available' => 4,
            'active' => true
        ]);
        Product::create([
            'sku' => 'FC-MOBI00000002',
            'manufacturer_id' => 2,
            'name' => 'Eclipse',
            'unit_price' => 129.99,
            'short_desc' => 'Short description of product goes here.',
            'long_desc' => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price' => null,
            'units_available' => 4,
            'active' => true
        ]);
        Product::create([
            'sku' => 'FC-MOBI00000003',
            'manufacturer_id' => 3,
            'name' => 'Universe X-71',
            'unit_price' => 422.99,
            'short_desc' => 'Short description of product goes here.',
            'long_desc' => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price' => null,
            'units_available' => 4,
            'active' => true
        ]);
        Product::create([
            'sku' => 'FC-MOBI00000004',
            'manufacturer_id' => 4,
            'name' => 'Orion III',
            'unit_price' => 721.99,
            'short_desc' => 'Short description of product goes here.',
            'long_desc' => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price' => 699.99,
            'units_available' => 4,
            'active' => true
        ]);
        Product::create([
            'sku' => 'FC-MOBI00000005',
            'manufacturer_id' => 5,
            'name' => 'Aries Ib',
            'unit_price' => 643.99,
            'short_desc' => 'Short description of product goes here.',
            'long_desc' => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price' => 619.99,
            'units_available' => 4,
            'active' => true
        ]);
        Product::create([
            'sku' => 'FC-MOBI00000006',
            'manufacturer_id' => 6,
            'name' => 'XD-1',
            'unit_price' => 3,
            'short_desc' => 'Short description of product goes here.',
            'long_desc' => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price' => null,
            'units_available' => 4,
            'active' => true
        ]);
        Product::create([
            'sku' => 'FC-MOBI00000007',
            'manufacturer_id' => 3,
            'name' => 'Axiom',
            'unit_price' => 400.99,
            'short_desc' => 'Short description of product goes here.',
            'long_desc' => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price' => null,
            'units_available' => 12,
            'active' => true
        ]);
        Product::create([
            'sku' => 'FC-MOBI00000008',
            'manufacturer_id' => 3,
            'name' => 'T-16 Bullseye',
            'unit_price' => 734.99,
            'short_desc' => 'Short description of product goes here.',
            'long_desc' => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price' => 699.99,
            'units_available' => 4,
            'active' => true
        ]);
        Product::create([
            'sku' => 'FC-MOBI00000009',
            'manufacturer_id' => 1,
            'name' => 'ETA-2 Actis',
            'unit_price' => 712.99,
            'short_desc' => 'Short description of product goes here.',
            'long_desc' => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price' => null,
            'units_available' => 66,
            'active' => true
        ]);
        Product::create([
            'sku' => 'FC-MOBI00000010',
            'manufacturer_id' => 4,
            'name' => 'C-3PO',
            'unit_price' => 799.99,
            'short_desc' => 'Short description of product goes here.',
            'long_desc' => 'This is the long description of the product. This description appears on the product detail page.',
            'sale_price' => null,
            'units_available' => 14,
            'active' => true
        ]);
    }
}

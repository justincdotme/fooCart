<?php

use Illuminate\Database\Seeder;
use fooCart\src\OrderProduct;

class OrderProductsTableSeeder extends Seeder {

    public function run()
    {
        OrderProduct::create(array(
            'order_id'         =>  1,
            'sku'           =>  'FC-HDTV00000004',
            'manufacturer'  =>  'Initech',
            'name'          =>  '52" HD Television',
            'price'         =>  799.91,
            'shipping'      =>  62.47,
            'tax'           =>  0.028,
            'quantity'      =>  1
        ));
        OrderProduct::create(array(
            'order_id'         =>  2,
            'sku'           =>  'FC-HDTV00000003',
            'manufacturer'  =>  'Initech',
            'name'          =>  '52" HD Television',
            'price'         =>  288.99,
            'shipping'      =>  25.43,
            'tax'           =>  0.028,
            'quantity'      =>  1
        ));
        OrderProduct::create(array(
            'order_id'         =>  2,
            'sku'           =>  'FC-HDTV00000004',
            'manufacturer'  =>  'Initech',
            'name'          =>  '52" HD Television',
            'price'         =>  799.91,
            'shipping'      =>  62.47,
            'tax'           =>  0.028,
            'quantity'      =>  1
        ));
        OrderProduct::create(array(
            'order_id'         =>  3,
            'sku'           =>  'FC-HDTV00000004',
            'manufacturer'  =>  'Initech',
            'name'          =>  '52" HD Television',
            'price'         =>  799.91,
            'shipping'      =>  62.47,
            'tax'           =>  0.028,
            'quantity'      =>  1
        ));
        OrderProduct::create(array(
            'order_id'         =>  3,
            'sku'           =>  'FC-HDTV00000003',
            'manufacturer'  =>  'Initech',
            'name'          =>  '52" HD Television',
            'price'         =>  288.99,
            'shipping'      =>  25.43,
            'tax'           =>  0.028,
            'quantity'      =>  1
        ));
    }
}
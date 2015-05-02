<?php

use Illuminate\Database\Seeder;
use fooCart\src\Order;

class OrdersTableSeeder extends Seeder {

    public function run()
    {
        Order::create(array(
            'customer_id'               =>  1,
            'order_total'               => 987.65,
            'tax_total'                 => 21.22,
            'shipping_total'            => 12.21,
            'status'                    =>  'Shipped'
        ));
        Order::create(array(
            'customer_id'               =>  2,
            'order_total'               => 265.55,
            'tax_total'                 => 12.21,
            'shipping_total'            => 56.32,
            'status'                    =>  'Paid'
        ));
        Order::create(array(
            'customer_id'               =>  3,
            'order_total'               =>  538.27,
            'tax_total'                 =>  27.62,
            'shipping_total'            =>  16.33,
            'status'                    =>  'Cancelled'
        ));
    }
}
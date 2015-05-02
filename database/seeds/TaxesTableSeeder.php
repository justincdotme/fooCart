<?php

use Illuminate\Database\Seeder;
use fooCart\src\Tax;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class TaxesTableSeeder extends Seeder {

    public function run()
    {
        Tax::create(array(
            'tax'   => 0.028,
        ));
        Tax::create(array(
            'tax'   => 0.016,
        ));
        Tax::create(array(
            'tax'   => 0.019,
        ));
    }

}
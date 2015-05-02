<?php

use Illuminate\Database\Seeder;
use fooCart\src\Manufacturer;

class ManufacturersTableSeeder extends Seeder {

    public function run()
    {
        Manufacturer::create(array(
            'manufacturer'        => 'Acme'
        ));
        Manufacturer::create(array(
            'manufacturer'        => 'Virtucon'
        ));
        Manufacturer::create(array(
            'manufacturer'        => 'Initech'
        ));
        Manufacturer::create(array(
            'manufacturer'        => 'Techniholdings'
        ));
        Manufacturer::create(array(
            'manufacturer'        => 'Rekall'
        ));
        Manufacturer::create(array(
            'manufacturer'        => 'Initrode'
        ));
    }

}
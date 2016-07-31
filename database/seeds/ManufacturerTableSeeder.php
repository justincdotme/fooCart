<?php

use fooCart\Core\Models\Manufacturer;
use Illuminate\Database\Seeder;

class ManufacturerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manufacturers = [
            [
                'manufacturer'        => 'Acme'
            ],
            [
                'manufacturer'        => 'Virtucon'
            ],
            [
                'manufacturer'        => 'Initech'
            ],
            [
                'manufacturer'        => 'Techniholdings'
            ],
            [
                'manufacturer'        => 'Rekall'
            ],
            [
                'manufacturer'        => 'Initrode'
            ],

        ];

        foreach ($manufacturers as $manufacturer) {
            Manufacturer::create($manufacturer);
        }
    }
}

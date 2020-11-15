<?php

namespace Database\Seeders;

use App\Models\Manufacturer;
use Illuminate\Database\Seeder;

class ManufacturersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Manufacturer::create([
            'name' => 'Acme'
        ]);

        Manufacturer::create([
            'name' => 'Soylent Industries'
        ]);

        Manufacturer::create([
            'name' => 'Virtucon'
        ]);

        Manufacturer::create([
            'name' => 'Initech'
        ]);

        Manufacturer::create([
            'name' => 'Techniholdings'
        ]);

        Manufacturer::create([
            'name' => 'Rekall'
        ]);

        Manufacturer::create([
            'name' => 'Initrode'
        ]);
    }
}

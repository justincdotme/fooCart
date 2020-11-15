<?php

namespace Database\Seeders;

use App\Models\ShippingProvider;
use Illuminate\Database\Seeder;

class ShippingProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ShippingProvider::create([
            'name' => 'UPS'
        ]);

        ShippingProvider::create([
            'name' => 'FedEx'
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\ShippingMethod;
use Illuminate\Database\Seeder;

class ShippingMethodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ShippingMethod::create([
            'name' => 'Ground',
            'shipping_provider_id' => 1
        ]);

        ShippingMethod::create([
            'name' => 'Standard',
            'shipping_provider_id' => 1
        ]);

        ShippingMethod::create([
            'name' => 'Next Day Air',
            'shipping_provider_id' => 1
        ]);

        ShippingMethod::create([
            'name' => 'Ground',
            'shipping_provider_id' => 2
        ]);

        ShippingMethod::create([
            'name' => 'Express',
            'shipping_provider_id' => 2
        ]);

        ShippingMethod::create([
            'name' => 'Smart Post',
            'shipping_provider_id' => 2
        ]);
    }
}

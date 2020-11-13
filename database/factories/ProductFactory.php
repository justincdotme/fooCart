<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sku' => 'FK-' . $this->faker->unique()->randomDigit,
            'manufacturer_id' => 1,
            'name' => 'Foo Product',
            'long_desc' => 'This is the rather long description of the product and all of it\'s qualities.',
            'short_desc' => 'This is a short description.',
            'unit_price' => 100.00,
            'sale_price' => null,
            'shipping_method_id' => 1,
            'units_available' => '',
            'active' => false
        ];
    }

    /**
     * @return ProductFactory
     */
    public function active()
    {
        return $this->state(function (array $attributes) {
            return [
                'active' => true,
            ];
        });
    }
}
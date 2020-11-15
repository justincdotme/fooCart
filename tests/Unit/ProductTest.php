<?php

namespace Tests\Unit;

use App\Models\Manufacturer;
use App\Models\Product;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function active_scope_contains_only_active_products()
    {
        $inactiveProducts = Product::factory()->count(2)->create();
        $activeProducts = Product::factory()->count(3)->active()->create();

        $this->assertEquals(3, Product::active()->count());
    }

    /**
     * @test
     */
    public function in_stock_scope_only_contains_in_stock_products()
    {
        $inStockProducts = Product::factory()->count(2)->inStock()->create();
        $soldOutProducts = Product::factory()->count(3)->outOfStock()->create();

        $this->assertEquals(2, Product::inStock()->count());
    }

    /**
     * @test
     */
    public function it_has_relationship_to_manufacturer()
    {
        $manufacturer = Manufacturer::make(['name' => 'Virtucon']);
        $product = Product::factory()->make();

        $product->setRelation('manufacturer', $manufacturer);

        $this->assertEquals($manufacturer->name, $product->manufacturer->name);
    }
}

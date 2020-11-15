<?php

namespace Tests\Feature;

use App\Models\Product;
use Database\Seeders\ManufacturersTableSeeder;
use Database\Seeders\ShippingMethodsTableSeeder;
use Database\Seeders\ShippingProvidersTableSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductListTest extends TestCase
{
    use DatabaseMigrations;


    protected $activeOutOfStock;
    protected $inactiveInStockProducts;
    protected $activeInStock;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed(ShippingProvidersTableSeeder::class);
        $this->seed(ShippingMethodsTableSeeder::class);
        $this->seed(ManufacturersTableSeeder::class);
        $this->activeOutOfStock = Product::factory()->count(2)->active()->outOfStock()->create();
        $this->inactiveInStockProducts = Product::factory()->count(3)->inactive()->inStock()->create();
        $this->activeInStock = Product::factory()->count(4)->active()->inStock()->create();
    }

    /**
     * @test
     */
    public function active_and_in_stock_products_are_included()
    {
        $response = $this->get(route('product.index'));

        $response->assertStatus(200);
        $response->assertViewHas('products');
        $products = $response->getOriginalContent()->getData()['products'];
        $this->assertEquals($this->activeInStock->count(), $products->count());
    }

    /**
     * @test
     */
    public function out_of_stock_products_are_not_included()
    {
        $products = $this->get(route('product.index'))->getOriginalContent()->getData()['products'];

        $failedProducts = [];
        $products->each(function ($i, $k) use ($failedProducts) {
            if (!$i->units_available > 0) {
                $failedProducts[] = $i;
                $this->fail('Product units_available should be greater than 0.');
            }
        });

        $this->assertEmpty($failedProducts);
    }

    /**
     * @test
     */
    public function inactive_products_are_not_included()
    {
        $products = $this->get(route('product.index'))->getOriginalContent()->getData()['products'];

        $failedProducts = [];
        $products->each(function ($i, $k) use ($failedProducts) {
            if ($i->active == 0) {
                $failedProducts[] = $i;
                $this->fail('Only active products should be included in /products route.');
            }
        });

        $this->assertEmpty($failedProducts);
    }
}

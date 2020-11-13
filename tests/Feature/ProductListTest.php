<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductListTest extends TestCase
{
    use DatabaseMigrations;
    /**
     *
     * @test
     */
    public function users_can_view_published_products()
    {
        $this->withoutExceptionHandling();

        $response = $this->get('/products');

        $response->assertStatus(200);
        $response->assertViewHas('products');
    }
}

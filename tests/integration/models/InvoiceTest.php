<?php

use fooCart\Core\Models\Invoice;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InvoiceTest extends TestCase
{
    /**
     * Test that the getPriceTotal method is accurate.
     *
     * @return void
     */
    public function testGetPriceTotalIsAccurate()
    {
        $this->assertEquals(1953.0, Invoice::find(1)->getPriceTotal());
    }

    /**
     * Test that the getPromotionTotal is correct for amount based promotion code.
     */
    public function testGetAmountPromotionTotalIsAccurate()
    {
        $this->assertEquals(5, Invoice::find(1)->getPromotionTotal());
    }

    /**
     * Test that the getPromotionTotal is correct for percent based promotion code.
     */
    public function testGetPercentPromotionTotalIsAccurate()
    {
        $this->assertEquals(180.015, Invoice::find(3)->getPromotionTotal());
    }

    /**
     * Test that the getPriceSubtotal is correct
     */
    public function testGetPriceSubtotalIsAccurate()
    {
        $this->assertEquals(1800.15, Invoice::find(3)->getPriceSubtotal());
    }
}

<?php

use fooCart\Core\Models\InvoiceItem;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InvoiceItemTest extends TestCase
{
    /**
     * Test the getTaxTotal method is accurate.
     *
     * @return void
     */
    public function testInvoiceItemTaxTotalIsAccurate()
    {
        $this->assertEquals(9.5, InvoiceItem::find(1)->getTaxTotal());
    }

    /**
     * Test that the getPromotionTotal method is accurate.
     *
     */
    public function testGetAmountPromotionTotalIsAccurate()
    {
        $this->assertEquals(20, InvoiceItem::find(1)->getPromotionTotal());
    }

    /**
     * Test that the getPromotionTotal method is accurate.
     *
     */
    public function testGetPercentPromotionTotalIsAccurate()
    {
        $this->assertEquals(61.14, InvoiceItem::find(2)->getPromotionTotal());
    }

    /**
     * Test that the getPriceTotal method is accurate.
     *
     */
    public function testGetPriceTotalIsAccurate()
    {
        $this->assertEquals(489.5, InvoiceItem::find(1)->getPriceTotal());
    }
}

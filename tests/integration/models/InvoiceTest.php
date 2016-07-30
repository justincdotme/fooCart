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
    public function testGetAmountInvoicePromotionTotalIsAccurate()
    {
        $this->assertEquals(5, Invoice::find(1)->getInvoicePromotionTotal());
    }
    /**
     * Test that the getPromotionTotal is correct for percent based promotion code.
     */
    public function testGetPercentInvoicePromotionTotalIsAccurate()
    {
        $this->assertEquals(180.015, Invoice::find(3)->getInvoicePromotionTotal());
    }
    /**
     * Test that the getPriceSubtotal is correct
     */
    public function testGetPriceSubtotalIsAccurate()
    {
        $this->assertEquals(1800.15, Invoice::find(3)->getPriceSubtotal());
    }
    /**
     * Test that the getTaxTotal method is accurate.
     */
    public function testGetTaxTotalIsAccurate()
    {
        $this->assertEquals(38.0, Invoice::find(1)->getTaxTotal());
    }
    /**
     * Test that the getInvoiceItemPromotion total is accurate.
     *
     */
    public function getInvoiceItemPromotionTotalIsAccurate()
    {
        $this->assertEquals(80, Invoice::find(1)->getInvoicePromotionTotal());
    }
}
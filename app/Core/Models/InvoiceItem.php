<?php

namespace fooCart\Core\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'type_id' => 'integer',
        'shipment_id' => 'integer',
        'invoice_id' => 'integer',
        'quantity' => 'integer',
        'unit_price' => 'float',
        'weight' => 'float',
        'promo_code_id' => 'integer',
        'tax_id' => 'integer'
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [];

    /**
     * Define relationship to invoice.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function invoice()
    {
        return $this->belongsTo('fooCart\Core\Models\Invoice');
    }

    /**
     * Define relationship to shipment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shipment()
    {
        return $this->belongsTo('fooCart\Core\Models\Shipment');
    }

    /**
     * Define the relationship to the promotion code.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function promotion()
    {
        return $this->belongsTo('fooCart\Core\Models\PromoCode', 'promo_code_id');
    }

    /**
     * Define the relationship to the tax rate.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function taxRate()
    {
        return $this->belongsTo('fooCart\Core\Models\TaxRate', 'tax_id');
    }

    /**
     * Define the relationship to the invoice item type.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function type()
    {
        return $this->belongsTo('fooCart\Core\Models\InvoiceItemType');
    }

    /**
     * Get the total price for the invoice item
     * Includes unit_price, tax and promo amount.
     *
     * @return float
     */
    public function getPriceTotal()
    {
        $total = ((($this->quantity * $this->unit_price) - $this->getPromotionTotal()) + $this->getTaxTotal());
        return ($total < 0) ? 0 : $total;
    }

    /**
     * Get the subtotal of the invoice item.
     *
     * @return mixed
     */
    public function getPriceSubTotal()
    {
        return ($this->quantity * $this->unit_price);
    }

    /**
     * Get the total promotion amount for the item.
     *
     * @return float
     */
    public function getPromotionTotal()
    {
        $promotionAmount = 0.00;
        if (!is_null($this->promo_code_id)) {
            $promotion = $this->promotion()->first();
            if ('percentage' === $promotion->type) {
                $promotionAmount = ($this->unit_price * $this->quantity * $promotion->discount_percent);
            } else if ('amount' === $promotion->type) {
                $promotionAmount = ($this->quantity * $promotion->discount_amount);
            }
        }

        return $promotionAmount;
    }

    /**
     * Calculate the tax total for the item.
     *
     * @return float
     */
    public function getTaxTotal()
    {
        $totalTax = 0;
        if (!is_null($this->tax_id)) {
            $totalTax = ($this->taxRate()->first()->rate * ($this->unit_price * $this->quantity));
        }
        return $totalTax;
    }
}
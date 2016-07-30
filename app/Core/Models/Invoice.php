<?php
namespace fooCart\Core\Models;
use Illuminate\Database\Eloquent\Model;
class Invoice extends Model
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
    protected $casts = [];
    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'invoiceItems'
    ];
    /**
     * Define the relationship to invoice items.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoiceItems()
    {
        return $this->hasMany('fooCart\Core\Models\InvoiceItem');
    }
    /**
     * Define the relationship to shipments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shipments()
    {
        return $this->hasMany('fooCart\Core\Models\Shipment');
    }
    /**
     * Define the relationship to user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('fooCart\Core\Models\User');
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
     * Define the relationship to the bankcard.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bankcard()
    {
        return $this->belongsTo('fooCart\Core\Models\Bankcard', 'promo_code_id');
    }
    /**
     * Get the total cost of the invoice.
     *
     * @return float
     */
    public function getPriceTotal()
    {
        return (
            (
                $this->getPriceSubtotal() +
                $this->getShippingTotal()
            )   - $this->getInvoicePromotionTotal()
        );
    }
    /**
     * Get the subtotal of all invoice items.
     *
     * @return float
     */
    public function getPriceSubtotal()
    {
        $total = array_reduce($this->invoiceItems->all(), function($carry, $item)
        {
            $carry += $item->getPriceTotal();
            return $carry;
        }, 0);
        $total -= $this->getShippingTotal();
        return ($total < 0) ? 0 : $total;
    }

    /**
     * Get the total shipping cost for the invoice.
     *
     * @return int|mixed
     */
    public function getShippingTotal()
    {
        $total = array_reduce($this->invoiceItems->all(), function($carry, $item)
        {
            $carry += $item->shipping_total;
            return $carry;
        }, 0);
        return ($total < 0) ? 0 : $total;
    }
    /**
     * Get the total promotion amount for the invoice.
     *
     * @return float
     */
    public function getInvoicePromotionTotal()
    {
        $promotionAmount = 0.00;
        if (!is_null($this->promo_code_id)) {
            $promotion = $this->promotion()->first();
            if ('percentage' === $promotion->type) {
                $promotionAmount = ($this->getPriceSubtotal() * $promotion->discount_percent);
            } else if ('amount' === $promotion->type) {
                $promotionAmount = $promotion->discount_amount;
            }
        }
        return $promotionAmount;
    }
    /**
     * Get the total amount for the promotions.
     * This only tallies invoice item promotions.
     *
     * @return float
     */
    public function getInvoiceItemPromotionTotal()
    {
        $total = array_reduce($this->invoiceItems->all(), function($carry, $item)
        {
            $carry += $item->getPromotionTotal();
            return $carry;
        }, 0);
        return $total;
    }
    /**
     * Get the combined promotion amount.
     * This adds the invoice and invoice items.
     *
     * @return float
     */
    public function getCombinedPromotionTotal()
    {
        return ($this->getInvoicePromotionTotal() + $this->getInvoiceItemPromotionTotal());
    }
    /**
     * Calculate the tax total for the invoice.
     *
     * @return float
     */
    public function getTaxTotal()
    {
        $total = array_reduce($this->invoiceItems->all(), function($carry, $item)
        {
            $carry += $item->getTaxTotal();
            return $carry;
        }, 0);
        return $total;
    }
}
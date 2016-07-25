<?php

namespace fooCart\Core;

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
     * Define relationship to invoice.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function invoice()
    {
        return $this->belongsTo('fooCart\Core\Invoice');
    }

    /**
     * Define relationship to shipment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shipment()
    {
        return $this->belongsTo('fooCart\Core\Shipment');
    }

    /**
     * Define the relationship to the promotion code.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function promotion()
    {
        return $this->belongsTo('fooCart\Core\PromoCode', 'promo_code_id');
    }

    /**
     * Define the relationship to the tax rate.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function taxRate()
    {
        return $this->belongsTo('fooCart\Core\TaxRate', 'tax_id');
    }

    /**
     * Define the relationship to the invoice item type.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function type()
    {
        return $this->belongsTo('fooCart\Core\InvoiceItemType');
    }
}

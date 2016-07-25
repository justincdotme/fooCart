<?php

namespace fooCart\Core;

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
     * Define the relationship to invoice items.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoiceItems()
    {
        return $this->hasMany('fooCart\Core\InvoiceItem');
    }

    /**
     * Define the relationship to shipments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shipments()
    {
        return $this->hasMany('fooCart\Core\Shipment');
    }

    /**
     * Define the relationship to user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('fooCart\Core\User');
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
     * Define the relationship to the bankcard.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bankcard()
    {
        return $this->belongsTo('fooCart\Core\Bankcard', 'promo_code_id');
    }
}

<?php

namespace fooCart\Core\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
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
     * Define the relationship to the manufacturer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function manufacturer()
    {
        return $this->belongsTo('fooCart\Core\Models\Manufacturer');
    }

    public function shippingOptions()
    {
        return $this->belongsToMany('fooCart\Core\Models\ShippingOption', 'product_shipping_options')
            ->withPivot('shipping_cost', 'created_at', 'updated_at');
    }

    /**
     * Return active products
     *
     */
    public function scopeActive()
    {
        return $this->where(function($query)
        {
            $query->whereNull('expires_on');
            $query->orWhereDate('expires_on', '>', Carbon::today()->toDateString());
        })->whereDate('active_on', '<=', Carbon::today()->toDateString());
    }

    /**
     * Get products that are on sale.
     *
     * @return mixed
     */
    public function scopeOnSale()
    {
        return $this->active()->whereNotNull('sale_price');
    }

    /**
     * Get products that are not on sale.
     *
     * @return mixed
     */
    public function scopeNotOnSale()
    {
        return $this->active()->whereNull('sale_price');
    }
}

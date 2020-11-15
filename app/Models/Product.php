<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Filter by active products.
     *
     * @param $query
     * @return mixed
     */
    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    /**
     * Filter in stock products.
     *
     * @param $query
     * @return mixed
     */
    public function scopeInStock($query)
    {
        return $query->where('units_available', '>', 0);
    }

    /**
     * Establish a relationship to the manufacturer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }
}

<?php namespace fooCart\src;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model {

    protected $table = 'taxes';
    protected $primaryKey = "tax_id";
    protected $guarded = ['tax_id'];

    /**
     * Get relationship to products model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->hasMany('fooCart\src\Product', 'tax_id', 'tax_id');
    }

    /**
     * Sort results by tax rate ascending.
     *
     * @param $query
     * @return mixed
     */
    public function scopeAscending($query)
    {
        return $query->orderBy('tax', 'asc');
    }

    /**
     * Return a list of tax rates in descending order.
     *
     * @return mixed
     */
    public function getJsonList()
    {
        return $this->Ascending()->lists('tax', 'tax_id');
    }
}
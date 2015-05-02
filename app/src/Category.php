<?php namespace fooCart\src;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    protected $table = 'categories';
    protected $primaryKey = "category_id";
    protected $guarded = ['category_id'];

    /**
     * Establish an Eloquent relationship with the child Product model.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('fooCart\src\Product', 'category_id', 'category_id');
    }

    /**
     * Sort results by category ascending.
     *
     * @param $query
     * @return mixed
     */
    public function scopeAscending($query)
    {
        return $query->orderBy('category', 'asc');
    }

    /**
     * Return a list of categories in descending order.
     *
     * @return mixed
     */
    public function getJsonList()
    {
        return $this->Ascending()->lists('category', 'category_id');
    }
}

<?php namespace fooCart\src;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model {

    protected $table = 'manufacturers';
    protected $primaryKey = "manufacturer_id";
    protected $fillable = ['manufacturer'];

    /**
     * Establish an Eloquent relationship with the child Product model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('fooCart\src\Product', 'product_id', 'manufacturer_id');
    }

    /**
     * Sort results by manufacturer ascending.
     *
     * @param $query
     * @return mixed
     */
    public function scopeAscending($query)
    {
        return $query->orderBy('manufacturer', 'asc');
    }

    /**
     * Return a list of manufacturers in descending order.
     *
     * @return mixed
     */
    public function getJsonList()
    {
        return $this->Ascending()->lists('manufacturer', 'manufacturer_id');
    }

    /**
     * Search manufacturer model by name.
     *
     * @param $searchTerm
     * @param $paginateCount
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function search($searchTerm, $paginateCount)
    {
        return $this->where('manufacturer', 'LIKE', "%$searchTerm%")->paginate($paginateCount);
    }
}
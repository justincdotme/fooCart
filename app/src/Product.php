<?php namespace fooCart\src;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Product extends Model {

    protected $table = 'products';
    protected $primaryKey = "product_id";
    protected $guarded = ['product_id'];

    /**
     * Establish an Eloquent relationship with the Category model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->hasOne('fooCart\src\Category', 'category_id', 'category_id');
    }

    /**
     * Establish an Eloquent relationship with the child ProductImage model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany('fooCart\src\ProductImage', 'product_id', 'product_id');
    }

    /**
     * Establish an Eloquent relationship with the child Tax model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tax()
    {
        return $this->hasOne('fooCart\src\Tax', 'tax_id', 'tax_id');
    }

    /**
     * Establish an Eloquent relationship with the parent Manufacturer model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function manufacturer()
    {
        return $this->belongsTo('fooCart\src\Manufacturer', 'manufacturer_id');
    }

    /**
     * Use Carbon to output timestamps in human readable format.
     *
     * @param $attr
     * @return null|string
     */
    protected function getHumanTimestampAttribute($attr)
    {
        if ($this->attributes[$attr])
        {
            return Carbon::parse($this->attributes[$attr])->diffForHumans();
        }
        return null;
    }

    /**
     * Output the updated_at timestamp in human readable format.
     *
     * @return null|string
     */
    public function getHumanUpdatedAt()
    {
        return $this->getHumanTimestampAttribute("updated_at");
    }

    /**
     * Get the sale price.
     * If no sale price, get the regular price.
     *
     * @return mixed
     */
    public function getFinalPrice()
    {
        return ($this->sale_price > 0) ? $this->sale_price : $this->price;
    }

    /**
     * Get the total cost of the product.
     * This includes tax, shipping and unit cost.
     *
     * @return mixed
     */
    public function getTotalPrice()
    {
        $tax = $this->tax->tax;
        $price = $this->getFinalPrice();
        $shipping = $this->shipping_cost;

        return ((($price + $shipping) * $tax) + $price + $shipping);
    }

    /**
     * Query scope for On-Sale products.
     *
     * @param $query
     * @return mixed
     */
    public function scopeSale($query)
    {
        return $query->where('sale_price', '>', 0);
    }

    /**
     * Get the full list of on-sale products.
     * Eager load the related images, manufacturer and category models.
     *
     * @return mixed
     */
    public function getSaleList()
    {
        return $this->with('images','manufacturer', 'category')->sale()->get();
    }

    public function getHomePageSaleList()
    {
        return $this->with('images','manufacturer', 'category')->sale()->take(6)->get();
    }

    /**
     * Get the full list of products.
     * Eager load the related images, manufacturer and category models.
     *
     * @return mixed
     */
    public function getProductList()
    {
        return $this->with('images','manufacturer', 'category')->get();
    }


    /**
     * Get a product by id.
     * Eager load the related images, manufacturer and category models.
     *
     * @param $product_id
     * @return \Illuminate\Database\Eloquent\Collection|Model|\Illuminate\Support\Collection|null|static
     */
    public function getProduct($product_id)
    {
        return $this->with('images','manufacturer', 'category')->find($product_id);
    }


    /**
     * Get a list of related products.
     * Related products are in same category as Product.
     *
     * @param $category_id
     * @param $count
     * @return mixed
     */
    public function getRelatedProducts($category_id, $count)
    {
        return $this->with('images','manufacturer', 'category')->where('category_id' , '=', $category_id)->take($count)->get();
    }

    /**
     * Search for product by name field.
     * Eager load the related images and manufacturer models.
     *
     * @param $searchTerm
     * @param $paginateCount
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function search($searchTerm, $paginateCount)
    {
        return $this->with('manufacturer', 'images')->where('name', 'LIKE', "%$searchTerm%")->paginate($paginateCount);
    }

    /**
     * Search for product by manufacturer ID.
     * Eager load the related images and manufacturer models.
     *
     * @param $manufacturer_id
     * @param $paginateCount
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function searchByManufacturer($manufacturer_id, $paginateCount)
    {
        return $this->with('manufacturer', 'images')->where('manufacturer_id', '=', $manufacturer_id)->paginate($paginateCount);
    }
}

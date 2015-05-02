<?php namespace fooCart\src;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Order extends Model {

    protected $table = 'orders';
    protected $primaryKey = "order_id";
    protected $guarded = ['order_id'];


    /**
     * Establish an Eloquent relationship with the parent Customer model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo('fooCart\src\Customer', 'customer_id');
    }


    /**
     * Establish an Eloquent relationship with the child OrderProduct model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('fooCart\src\OrderProduct', 'order_id', 'order_id');
    }

    /**
     * Use Carbon to output timestamps in formatted date string format.
     *
     * @param $attr
     * @return null|string
     */
    protected function getFormattedDateTimestampAttribute($attr)
    {
        if ($this->attributes[$attr])
        {
            return Carbon::parse($this->attributes[$attr])->toFormattedDateString();
        }

        return null;
    }

    /**
     * Output the created_at timestamp in date string format.
     *
     * @return null|string
     */
    public function getFormattedCreatedAt()
    {
        return $this->getFormattedDateTimestampAttribute('created_at');
    }

    /**
     * Get the current list of orders.
     *
     * @return mixed
     */
    public function getOrderList()
    {
        return $this->with('customer', 'products')->orderBy('created_at', 'desc')->get();
    }

    /**
     * Get the order, by ID.
     * Eager load related Products and Customer models.
     *
     * @param $order_id
     * @return \Illuminate\Database\Eloquent\Collection|Model|\Illuminate\Support\Collection|null|static
     */
    public function getOrder($order_id)
    {
        return $this->with('products', 'customer')->find($order_id);
    }
}

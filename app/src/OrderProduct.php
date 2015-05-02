<?php namespace fooCart\src;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model {

    protected $table = 'order_products';
    protected $primaryKey = "order_product_id";
    protected $guarded = ['order_product_id'];


    /**
     * Establish an Eloquent relationship with the parent Order model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo('fooCart\src\Order', 'order_id', 'order_id');
    }


    /**
     * Delete OrderProduct models belonging to order_id.
     *
     * @param $order_id
     * @return mixed
     */
    public function deleteOrderProducts($order_id)
    {
        return $this->where('order_id', '=', $order_id)->delete();
    }
}

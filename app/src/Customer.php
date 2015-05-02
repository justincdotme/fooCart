<?php namespace fooCart\src;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model {

    protected $table = 'order_customers';
    protected $primaryKey = "customer_id";
    protected $guarded = ['customer_id'];

    /**
     * Establish an Eloquent relationship with the child Order model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany('fooCart\src\Order', 'customer_id');
    }

    /**
     * Delete the Customer who placed the order.
     *
     * @param $customer_id
     * @return mixed
     */
    public function deleteCustomer($customer_id)
    {
        return $this->where('customer_id', '=', $customer_id)->delete();
    }
}

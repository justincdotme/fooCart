<?php namespace fooCart\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Exception;
use fooCart\Http\Requests;
use fooCart\Http\Controllers\Controller;
use fooCart\Http\Requests\SubmitOrderRequest;
use fooCart\src\Customer;
use fooCart\src\Order;
use fooCart\src\OrderProduct;



class OrderController extends Controller {

    protected $_request;
    protected $_order;
    protected $_checkout;

    public function __construct(Request $request, Order $order)
    {
        $this->_request = $request;
        $this->_order = $order;
        $this->_checkout = $checkout = App::make('fooCart\src\Checkout\Interfaces\CheckoutInterface');
    }

	/**
	 * Show a list of all orders.
	 *
	 * @return Response
	 */
	public function index()
	{
        try {
            $orders = $this->_order->getOrderList();
        } catch(Exception $e)
        {
            $orders = null;
        }

        return view('admin.orders')
            ->withOrders($orders);
	}

    /**
     * Show the form for placing a new order.
     *
     * @return Response
     * @internal param Request $request
     */
	public function create()
	{
        //Redirect back to the cart page if cart===empty
        if(empty($this->_request->cookie('cart')))
        {
            return redirect('/cart');
        }
        return view('public.checkout-form');
	}

    /**
     * Submit the order
     * Save order details to DB
     * Charge the user's credit card
     *
     * @param SubmitOrderRequest $request
     * @return Response
     */
	public function store(SubmitOrderRequest $request, Customer $customer, Order $order)
	{
        if(is_null($request->input('stripe-token')))
        {
            //This means that either the token was not set or the user has JS disabled
            return view('public.checkout-form')
                ->withError('This application requires JavaScript enabled in the browser');
        }

        $cart = App::make('fooCart\src\Cart\Interfaces\CartInterface', [$request]);
        $contents = $cart->getCartContents();

        try {
            //Start the transaction.
            DB::beginTransaction();

            //Create the new customer.
            $customer->first_name = $request->input('first_name');
            $customer->last_name = $request->input('last_name');
            $customer->addr_street_1 = $request->input('addr_street_1');
            $customer->addr_street_2 = $request->input('addr_street_2');
            $customer->addr_city = $request->input('addr_city');
            $customer->addr_state = $request->input('addr_state');
            $customer->addr_zip = $request->input('addr_zip');
            $customer->home_phone = str_replace('-', '', $request->input('home_phone'));
            $customer->save();

            //Create the new order.
            $order->customer_id = $customer->customer_id;
            $order->order_total = $contents['total_price'];
            $order->tax_total = $contents['total_tax'];
            $order->shipping_total = $contents['total_shipping'];
            $order->status = 'Paid';
            $order->save();

            //Add each item from the cart to the order.
            foreach($contents['items'] as $key => $item)
            {
                $product = new OrderProduct;
                $product->order_id      = $order->order_id;
                $product->sku           = $item->sku;
                $product->manufacturer  = $item->manufacturer->manufacturer;
                $product->name          = $item->name;
                $product->price         = $item->price;
                $product->shipping      = $item->shipping_cost;
                $product->tax           = $item->tax->tax;
                $product->quantity      = $contents['quantities'][$key];
                $product->save();
            }

            //Commit the transaction.
            DB::commit();

            //Charge the customer's credit card.
            $this->_checkout->charge([
                'source'        => $request->input('stripe-token'),
                'description'   => $customer->first_name . ' ' . $customer->last_name . ' Order# ' . $order->order_id ,
                'amount'        => round($order->order_total * 100)
            ]);

            //Unset the cart cookie
            $cookie = Cookie::forget('cart');

            //Remove the total amount session var
            $request->session()->forget('cartTotal');

            //Finally, return the order confirmation view with the order list.
            $order = $this->_order->getOrder($order->order_id);

            return response()
                ->view('public.order-confirmation', ['order' => $order])
                ->withCookie($cookie);

        } catch (Exception $e) {
            //Rollback the transaction if any part fails.
            DB::rollback();
            //Return the user to the checkout form with a generic error.
            return view('public.checkout-form')
                ->withError('An error has occurred. Please try again later.');
        }
	}

    /**
     * Show the order-detail page.
     *
     * @param $order_id
     * @return Response
     * @internal param int $id
     */
	public function show($order_id)
	{
		try {
            $order = $this->_order->getOrder($order_id);
        } catch(Exception $e)
        {
            $order = null;
        }
        return view('admin.order-detail')
            ->withOrder($order);
	}

    /**
     * Update the order status in the DB.
     *
     * @param $order_id
     * @return Response
     * @internal param Request $request
     * @internal param int $id
     */
	public function update($order_id)
	{
		try {
            $order = $this->_order->find($order_id);
            $order->status = $this->_request->input('status');
            $order->save();
            return redirect('admin/orders');
        } catch(Exception $e) {
            return redirect('admin/orders');
        }
	}

    /**
     * Delete the order from DB.
     *
     * @param $order_id
     * @return Response
     * @throws Exception
     * @internal param int $id
     */
	public function destroy($order_id, OrderProduct $product, Customer $customer)
	{
        try {
            DB::beginTransaction();

            //Get the customer ID from the order.
            //Then, delete the order.
            $order = $this->_order->find($order_id);
            $customerId = $order->customer_id;
            $order->delete();

            //Delete order products.
            $product->deleteOrderProducts($order_id);

            //Delete the customer who placed the order.
            //We shouldn't hang on to anyone's personal info for longer than we have to.
            $customer->deleteCustomer($customerId);

            DB::commit();

            return redirect('admin/orders');
        } catch (Exception $e) {
            DB::rollback();
            return redirect('admin/orders');
        }
	}
}

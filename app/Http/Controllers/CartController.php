<?php namespace fooCart\Http\Controllers;

use fooCart\Http\Requests;
use fooCart\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CartController extends Controller {

    protected $_request;
    protected $_cart;

    public function __construct(Request $request)
    {
        $this->_request = $request;
        $this->_cart = App::make('fooCart\src\Cart\Interfaces\CartInterface', [$this->_request]);
    }

    /**
     * Display the shopping cart.
     *
     * @return Response
     * @internal param Request $request
     * @internal param Cart $cart
     */
	public function index()
	{
        $contents = $this->_cart->getCartContents();

        return view('public.cart')
            ->withContents($contents['items'])
            ->withQuantities($contents['quantities'])
            ->withSubtotal(round($contents['subtotal'], 2))
            ->withTax(round($contents['total_tax'], 2))
            ->withShipping(round($contents['total_shipping'], 2))
            ->withTotal($contents['total_price']);
	}

    /**
     * Add a product to the shopping cart.
     *
     * @param $productId
     * @return Response
     * @internal param Request $request
     */
	public function store($productId)
	{
        $updatedCart = $this->_cart->addProduct($productId);
        return redirect('cart')
            ->withCookie(cookie()->forever('cart', $updatedCart));
	}

    /**
     * Update a product in the shopping cart.
     *
     * @param $productId
     * @return Response
     * @internal param Request $request
     * @internal param int $id
     */
	public function update($productId)
	{
        $updatedCart = $this->_cart->updateProduct($productId);
        return redirect('cart')
            ->withCookie(cookie()->forever('cart', $updatedCart));
	}

    /**
     * Delete a product from the shopping cart.
     *
     * @param $productId
     * @return Response
     * @internal param Request $request
     * @internal param int $id
     */
	public function destroy($productId)
	{
        $updatedCart = $this->_cart->deleteProduct($productId);
        return redirect('cart')
            ->withCookie(cookie()->forever('cart', $updatedCart));
	}
}

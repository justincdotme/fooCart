<?php namespace fooCart\src\Cart;

use fooCart\src\Cart\Interfaces\CartInterface;
use fooCart\src\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Session;

/**
 * Class Cart
 *
 * This class contains the methods used by the shopping cart implementation.
 *
 * The Cart class contains 4 methods: addProduct(), updateProduct(), deleteProduct() and getCartContents().
 * These methods do exactly as their names describe. This shopping cart implementation has been bound to
 * an interface via CartServiceProvider to allow for easy updating if a different implementation is used in the future.
 * This class implements the CartInterface.
 *
 *
 * PHP Version 5.6
 *
 * License: Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package fooCart
 * @author Justin Christenson <info@justinc.me>
 * @version 1.0.0
 * @license http://opensource.org/licenses/mit-license.php
 * @link https://foocart.justinc.me
 *
 */

class Cart implements CartInterface {

    protected $_cartCookie;
    protected $_request;
    protected $_newQuantity;

    public function __construct($request)
    {
        $this->_request = $request;
        //If the cookie is set, use it. If not, create the cookie as an empty array.
        $this->_cartCookie = (!is_null($this->_request->cookie('cart'))) ? $this->_request->cookie('cart') : [];
        //If there is a new quantity, set it. If not, don't set it.
        $this->_newQuantity = (!is_null($this->_request->input('newQuantity'))) ? $this->_request->input('newQuantity') : false;
    }

    /**
     * Add product to cart if it does not exist.
     * If product does exist in cart, increment its quantity by 1.
     *
     * @param $product_id
     * @return array
     */
    public function addProduct($product_id)
    {
        if(array_key_exists($product_id, $this->_cartCookie))
        {
            $this->_cartCookie[$product_id] += 1;
            return $this->_cartCookie;
        }

        $this->_cartCookie[$product_id] = 1;
        return $this->_cartCookie;
    }

    /**
     * Update the cart with the supplied quantity.
     * Remove the product from cart if supplied quantity < 1.
     *
     * @param $product_id
     * @return array
     */
    public function updateProduct($product_id)
    {
        if(intval($this->_newQuantity) < 1)
        {
            $this->deleteProduct($product_id);
            return $this->_cartCookie;
        }

        $this->_cartCookie[$product_id] = $this->_newQuantity;
        return $this->_cartCookie;
    }


    /**
     * Remove product from cart.
     *
     * @param $productId
     * @return array
     */
    public function deleteProduct($productId)
    {
        foreach($this->_cartCookie as $cartProductId => $quantity)
        {
            if($cartProductId == $productId)
            {
                unset($this->_cartCookie[$cartProductId]);
                return $this->_cartCookie;
            }
        }
    }

    /**
     * Get the contents of the cart.
     *
     * @return array
     */
    public function getCartContents()
    {
        $itemQuantities = [];
        $cartContent = new Collection();
        $subTotalPrice = 0;
        $totalTax = 0;
        $totalShipping = 0;

        if($this->_cartCookie)
        {
            foreach($this->_cartCookie as $productId => $quantity)
            {
                $item = Product::with('manufacturer', 'tax')->where('product_id', '=', $productId)->firstOrFail();
                $cartContent->add($item);
                array_push($itemQuantities, $quantity);
                $totalShipping += floatval($item->shipping_cost) * intval($quantity);
                $subTotalPrice += floatval($item->getFinalPrice()) * intval($quantity) + $totalShipping;
                $totalTax += floatval($item->tax->tax) * floatval($subTotalPrice);
            }
            //Store the total price in session so that we can display the total amount on every page via view composer.
            $totalPrice = $subTotalPrice + $totalTax;
            Session::put('cartTotal', $totalPrice);

            $contents = [
            'subtotal'          => $subTotalPrice,
            'total_tax'         => $totalTax,
            'total_shipping'    => $totalShipping,
            'total_price'       => $totalPrice,
            'quantities'        => $itemQuantities,
            'items'             => $cartContent
            ];
            return $contents;
        }

        //Store the total price in session so that we can display the total amount on every page via view composer.
        Session::put('cartTotal', 0.00);
        return null;
    }
}
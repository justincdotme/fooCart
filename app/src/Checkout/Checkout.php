<?php namespace fooCart\src\Checkout;

use fooCart\src\Checkout\Interfaces\BillingInterface;
use fooCart\src\Checkout\Interfaces\CheckoutInterface;
use Illuminate\Support\Facades\Config;
use Exception;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Error\Card;

/**
 * Class Checkout
 *
 * This class contains 1 method: charge().
 *
 * This Checkout implementation's charge() method sends order and payment token to the Stripe server.
 * This Checkout implementation has been bound to an interface via CheckoutServiceProvider to allow for easy updating
 * if a different payment processing implementation is used in the future.
 * This class implements the CheckoutInterface.
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

class Checkout implements CheckoutInterface {

    public function __construct()
    {
        //Set the Stripe key using the Stripe PHP SDK and the Stripe config file.
        Stripe::setApiKey(Config::get('stripe.secret_key'));
    }

    /**
     * Charge the credit card.
     * This implementation uses the Stripe PHP SDK.
     *
     * @param array $data
     * @return string|Charge
     */
    public function charge(array $data)
    {
        try
        {
            return Charge::create([
                'amount' => $data['amount'],
                'currency' => 'usd',
                'description' => $data['description'],
                'source' => $data['source']
            ]);
        } catch(Card $e)
        {
            //Card was declined, return the error.
            $error = 'Your card was declined.';
            return $error;
        } catch(Exception $e)
        {
            //A generic exception has occurred, unrelated to Stripe
            $error = 'An error has occurred, please try again.';
            return $error;
        }
    }
}
<?php namespace fooCart\src\Checkout\Interfaces;

interface CheckoutInterface {

    public function charge(array $data);
}
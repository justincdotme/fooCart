<?php namespace fooCart\src\Cart\Interfaces;

interface CartInterface {

    public function addProduct($product_id);

    public function updateProduct($product_id);

    public function getCartContents();
}

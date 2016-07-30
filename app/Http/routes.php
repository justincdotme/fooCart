<?php

use fooCart\Core\Models\Invoice;

Route::get('/', function () {
    return view('welcome');
});
Route::get('test', function () {
    $invoice = Invoice::find(1);
    return Invoice::find(1)->getPriceTotal();
});
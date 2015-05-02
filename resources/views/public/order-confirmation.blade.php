@extends('public.layouts.main')

@section('title')
    @parent Your Order
@stop

@section('content')
    <div class="container">
        <div class="row row-top-buffer">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h1 class="inline">Your Order</h1>
                    <h3 class="pull-right">
                        <a class="btn btn-primary pull-right" href="javascript:window.print()">
                            <span class="glyphicon glyphicon-print"></span>  Print
                        </a>
                    </h3>
                    <h4>Please <a href="javascript:window.print()">print</a> this page for your records.</h4>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-striped table-responsive table-hover table-bordered" id="table-cart">
                                <thead>
                                <tr>
                                    <th class="col-sm-9 text-left">Product</th>
                                    <th class="col-sm-1">Price</th>
                                    <th class="col-sm-1">Qty</th>
                                    <th class="col-sm-1">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order->products as $item)
                                    <tr>
                                        <td>
                                            <h4>{{ $item->manufacturer }} - {{ $item->name }}</h4>
                                            <h5>SKU: {{ $item->sku }}</h5>
                                        </td>
                                        <td class="text-center item-cost">
                                            {{ number_format($item->price, 2) }}
                                        </td>
                                        <td class="text-center item-quantity">
                                            <div class="form-group">
                                                {{ $item->quantity }}
                                            </div>
                                        </td>
                                        <td class="text-center item-total">
                                            {{ number_format(($item->price) * $item->quantity, 2) }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 pull-right">
                            <table class="table table-striped table-responsive table-hover table-bordered">
                                <tbody>
                                    <tr>
                                        <td class="col-sm-6">
                                            <strong>Subtotal</strong>
                                        </td>
                                        <td class="col-sm-6">
                                            ${{ number_format($order->order_total - ($order->shipping_total + $order->tax_total), 2) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Shipping</strong>
                                        </td>
                                        <td>
                                            ${{ number_format($order->shipping_total, 2) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Tax</strong>
                                        </td>
                                        <td>
                                            ${{ number_format($order->tax_total, 2) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Total</strong>
                                        </td>
                                        <td>
                                            ${{ number_format($order->order_total, 2) }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
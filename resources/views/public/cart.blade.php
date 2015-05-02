@extends('public.layouts.main')

@section('title')
    @parent Your Cart
@stop

@section('content')
    <div class="container">
        <div class="row row-top-buffer">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h1>Your Cart</h1>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-striped table-responsive table-hover table-bordered" id="table-cart">
                                <thead>
                                <tr>
                                    <th class="col-sm-1">Remove</th>
                                    <th class="col-sm-8 text-left">Product</th>
                                    <th class="col-sm-1">Price</th>
                                    <th class="col-sm-1">Qty</th>
                                    <th class="col-sm-1">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!is_null($contents))
                                    @foreach($contents as $key => $item)
                                        <tr>
                                            <td class="text-center vcenter item-delete">
                                                <a href="/cart/delete/{{ $item->product_id }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
                                            </td>
                                            <td>
                                                <a href="/products/{{ $item->product_id }}">
                                                    <h4>{{ $item->manufacturer->manufacturer }} - {{ $item->name }}</h4>
                                                    <h5>SKU: {{ $item->sku }}</h5>
                                                </a>
                                            </td>
                                            <td class="text-center item-cost">
                                                {{ number_format($item->getFinalPrice(), 2) }}
                                            </td>
                                            <td class="text-center item-quantity">
                                                <div class="form-group">
                                                    {!! Form::open(['method' => 'PUT', 'route' => ['cart.update', $item->product_id]]) !!}
                                                    <input name="newQuantity" type="number" min="0" class="form-control" value="{{ $quantities[$key] }}">
                                                    {!! Form::button('Update', ['class' => 'btn btn-xs btn-primary', 'type' => 'submit']) !!}
                                                    {!! Form::close() !!}
                                                </div>
                                            </td>
                                            <td class="text-center item-total">
                                                {{ number_format(($item->getFinalPrice()) * $quantities[$key], 2) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5">
                                            <h1 class="text-center">Cart is empty</h1>
                                        </td>
                                    </tr>
                                @endif
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
                                            ${{ number_format($subtotal, 2) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Shipping</strong>
                                        </td>
                                        <td>
                                            ${{ number_format($shipping, 2) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Tax</strong>
                                        </td>
                                        <td>
                                            ${{ number_format($tax, 2) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Total</strong>
                                        </td>
                                        <td>
                                            ${{ number_format($total, 2) }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="/order" class="btn btn-primary pull-right" aria-label="Checkout">
                                Checkout <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
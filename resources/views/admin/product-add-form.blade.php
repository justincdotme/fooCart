@extends('admin.layouts.admin-main')

@section('title')
    @parent Add Product
@stop

@section('content')
    <div class="container">
        <div class="row row-top-buffer">
            <div class="col-sm-12">
                <h1>{{ $title or 'Product' }}</h1>
            </div>
        </div>
        <div class="row row-top-buffer">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel panel-body main-container">
                        @if($errors->any())
                            <div class="row">
                                <div class="col-sm-12 alert alert-danger">
                                    <h1>Error <span class="glyphicon glyphicon-exclamation-sign"></span></h1>
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        {!! Form::open(['method' => 'POST', 'route' => ['admin.products.store'],  'class' => 'primary-form']) !!}
                                                        {!! Form::label('name', 'Name') !!}
                                                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        {!! Form::label('sku', 'SKU') !!}
                                                        {!! Form::text('sku', null, array('class' => 'form-control', 'placeholder' => 'SKU')) !!}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        {!! Form::label('category_id', 'Category') !!}
                                                        <a data-toggle="modal" data-target="#new-category-modal" href="#" id="new_category" class="pull-right">
                                                            <span class="glyphicon glyphicon-plus"></span> Add Category
                                                        </a>
                                                        {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        {!! Form::label('manufacturer_id', 'Manufacturer') !!}
                                                        <a data-toggle="modal" data-target="#new-manufacturer-modal" href="#" id="new_manufacturer" class="pull-right">
                                                            <span class="glyphicon glyphicon-plus"></span> Add Manufacturer
                                                        </a>
                                                        {!! Form::select('manufacturer_id', $manufacturers, null, ['class' => 'form-control']) !!}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        {!! Form::label('price', 'Price') !!}
                                                        {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'Price']) !!}
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        {!! Form::label('sale_price', 'Sale Price') !!}
                                                        {!! Form::text('sale_price', null, ['class' => 'form-control', 'placeholder' => 'No Sale']) !!}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        {!! Form::label('shipping_cost', 'Shipping Cost') !!}
                                                        {!! Form::text('shipping_cost', null, ['class' => 'form-control', 'placeholder' => 'Shipping Cost']) !!}
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        {!! Form::label('tax_id', 'Tax Rate') !!}
                                                        <a data-toggle="modal" data-target="#new-tax-modal" href="#" id="new_tax_rate" class="pull-right">
                                                            <span class="glyphicon glyphicon-plus"></span> Add Tax Rate
                                                        </a>
                                                        {!! Form::select('tax_id', $tax, null, ['class' => 'form-control', 'placeholder' => 'Tax Rate']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                {!! Form::label('short_desc', 'Short Description') !!}
                                                {!! Form::textarea('short_desc', null, ['class' => 'form-control', 'placeholder' => 'Short Description']) !!}
                                            </div>
                                            <div class="form-group col-sm-6">
                                                {!! Form::label('long_desc', 'Long Description') !!}
                                                {!! Form::textarea('long_desc', null, ['class' => 'form-control', 'placeholder' => 'Long Description']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="form-group col-sm-4">
                                                {!! Form::label('units_sold', 'Units Sold') !!}
                                                {!! Form::input('number', 'units_sold', 0, ['class' => 'form-control', 'placeholder' => 'Units Sold']) !!}
                                            </div>
                                            <div class="form-group col-sm-4">
                                                {!! Form::label('number_available', 'In Stock') !!}
                                                {!! Form::input('number', 'number_available', 0, ['class' => 'form-control', 'placeholder' => 'In Stock']) !!}
                                            </div>
                                            <div class="form-group col-sm-4">
                                                {!! Form::label('active', 'Active') !!}
                                                {!! Form::select('active', ['0' => 'No', '1' => 'Yes'], 1, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div>
                                    {!! Form::submit('Save Product', ['class' => 'btn btn-primary btn-block']) !!}
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.partials.add-tax-rate')
    @include('admin.partials.add-manufacturer')
    @include('admin.partials.add-category')
    @include('admin.partials.product-script')
    @include('admin.partials.error')
@stop

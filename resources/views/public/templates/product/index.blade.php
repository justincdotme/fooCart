@extends('public.layouts.main')

@section('content')
    <div class="row">
        <div class="col-12 md-2">
            <div id="app">
                <product-list></product-list>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        window.categories = [
            {id: 0, name: "Category"},
            {id: 1, name: "TV"},
            {id: 2, name: "Laptop"},
            {id: 3, name: "Desktop"},
            {id: 4, name: "Tablet"}
        ];

        window.products = {!! $products !!};
    </script>
    <script src="{{ asset('/js/product/product-list.js') }}"></script>
@endpush
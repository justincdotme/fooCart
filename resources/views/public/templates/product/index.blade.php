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
    <script src="{{ asset('/js/product/index.js') }}"></script>
@endpush
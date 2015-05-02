@extends('public.layouts.main')

@section('title')
    @parent Welcome
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ul class="rslides">
                    @forelse($slides as $slide)
                        <li>
                            <a href="{{ $slide->href }}"><img src="{{ $slide->image_path }}"></a>
                        </li>
                    @empty
                        <li>
                            <a href="#"><img src="http://placehold.it/792x312"></a>
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
        <div class="row row-top-buffer">
            <div class="col-sm-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <a href="/shop">
                            <div class="thumbnail">
                                <img src="/images/multi-product-image.jpg" alt="Shop All Products">
                            </div>
                            <div class="text-center">
                                <h3>Shop All Products</h3>
                                <p class="text-center short-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tristique ipsum ligula.</p>
                                <p class="text-center"><a href="/shop" class="btn btn-primary" role="button">View</a></p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <a href="/shop/on-sale">
                            <div class="thumbnail">
                                <img src="/images/multi-product-image.jpg" alt="On Sale Now">
                            </div>
                            <div class="text-center">
                                <h3>Shop Sale Products</h3>
                                <p class="text-center short-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tristique ipsum ligula.</p>
                                <p class="text-center"><a href="/shop/on-sale" class="btn btn-primary" role="button">View</a></p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <a href="/products/12">
                            <div class="thumbnail">
                                <img src="/images/promo-computer.jpg" alt="Featured Product">
                            </div>
                            <div class="text-center">
                                <h3>Featured Product</h3>
                                <h4>Bates 9000</h4>
                                <p class="text-center short-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tristique ipsum ligula.</p>
                                <p class="text-center"><a href="/products/12" class="btn btn-primary" role="button">View</a></p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <ul class="list-group">
                    <li class="list-group-item active">
                        <h4>Current Specials</h4>
                    </li>
                    @if(isset($sales))
                        @foreach($sales as $item)
                        <li class="list-group-item">
                            <a href="/products/{{ $item->product_id }}">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4 class="list-group-item-heading">{{ $item->manufacturer->manufacturer }} - {{ $item->name }}</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="thumbnail">
                                            <img class="inline vtop" src="{{ isset($item->images->first()->image_path) ? $item->images->first()->image_path : 'http://placehold.it/221x221' }}" />
                                        </div>
                                    </div>
                                    <div class="col-sm-7 no-left-padding sm-center">
                                        <p class="list-group-item-text">{{ $item->short_desc }}</p>
                                        <span class="badge discount-old-price"><del>{{ $item->price }}</del></span> <span class="badge discount-new-price">{{ $item->sale_price }}</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    @else
                        <li class="list-group-item">
                            <h4 class="text-center">No current sales</h4>
                            <h5 class="text-center">Check back soon!</h5>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
@stop
@section('footer')
    <script src="/js/responsiveslides.min.js"></script>
    <script>
        /**
         * Initialize the main slideshow.
         * Slideshow utilizes the ResponsiveSlides.js plugin.
         * http://responsiveslides.com
         */
        $(function() {
            $(".rslides").responsiveSlides({
                auto: true,
                speed: 800,
                timeout: 6000,
                pause: true
            });
        });
    </script>
@stop
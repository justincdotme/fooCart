<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html class="no-js lt-ie9 lt-ie8" lang="en"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html class="no-js lt-ie9" lang="en"><![endif]-->
<!--[if (IE 9)]><html class="no-js ie9" lang="en"><![endif]-->
<!--[if gt IE 8]><!--> <html lang="en-US"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="HandheldFriendly" content="true"/>
    <meta name="MobileOptimized" content="320"/>
    <title>fooCart - @yield('title', 'Welcome')</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/custom.css" rel="stylesheet">
    <link href="/css/responsiveslides.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="#">
    <link rel="apple-touch-icon" href="#">
    <link rel="apple-touch-icon" sizes="114x114" href="#">
    <link rel="apple-touch-icon" sizes="72x72" href="#">
    <link rel="apple-touch-icon" sizes="144x144" href="#">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
</head>
<body>
    <nav class="navbar navbar-fixed-top navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><strong><span class="white">foo</span><span class="blue">Cart</span></strong></a>
            </div>
            <div id="navbar" class="collapse navbar-collapse navbar-main">
                <ul class="nav navbar-nav">
                    <li class="{{ ( Route::getCurrentRoute()->getPath() === '/' ) ? 'active' : NULL }}">
                        <a href="/">Home</a>
                    </li>
                    <li class="{{ ( Route::getCurrentRoute()->getPath() === 'shop' ) ? 'active' : NULL }}">
                        <a href="/shop" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Shop <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/shop">All Products</a></li>
                            <li><a href="/shop/on-sale">On Sale</a></li>
                        </ul>
                    </li>
                    <li class="{{ ( Route::getCurrentRoute()->getPath() === 'shop/on-sale' ) ? 'active' : NULL }}">
                        <a href="/shop/on-sale">On Sale</a>
                    </li>
                    <li class="{{ ( Route::getCurrentRoute()->getPath() === 'about' ) ? 'active' : NULL }}">
                        <a href="/about">About</a>
                    </li>
                </ul>
                <div class="col-sm-3 col-md-3 navbar-right">
                    <form class="navbar-form" role="search" action="/search" method="GET">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="input-group">
                            <input type="text" value="{{ $query or null }}" class="form-control" placeholder="Search" name="query" id="srch-term">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/cart"><span class="blue glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> <span class="white"> ${{ number_format($total, 2) }}</span></a></li>
                </ul>

            </div>
        </div>
    </nav>
    @yield('content')
    <footer class="footer navbar-fixed-bottom navbar-inverse">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <p class="text-muted text-center"><strong><span class="white">foo</span><span class="blue">Cart</span></strong><br />
                        Copyright 2015 <a href="http://justinc.me" target="_BLANK">Justin Christenson</a></p>
                </div>
            </div>
        </div>
    </footer>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    @yield('footer')
</body>
</html>

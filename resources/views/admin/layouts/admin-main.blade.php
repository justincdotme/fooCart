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
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/custom.css" rel="stylesheet">
    <link href="/css/responsiveslides.css" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!--SLIDESHOW UPLOADER-->
    <script src="/js/croppic.min.js"></script>
    <link href="/css/croppic.css" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

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
                <a class="navbar-brand" href="/admin"><strong><span class="white">foo</span><span class="blue">Cart</span></strong></a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                @if(Auth::check())
                <ul class="nav navbar-nav">
                    <li class="{{ ( Route::getCurrentRoute()->getPath() === 'admin/orders' || Route::getCurrentRoute()->getPath() === 'admin' ) ? 'active' : NULL }}">
                        <a href="/admin/orders">Orders</a>
                    </li>
                    <li class="dropdown {{ ( Route::getCurrentRoute()->getPath() === 'admin/products' || Route::getCurrentRoute()->getPath() === 'admin/products/create' ) ? 'active' : NULL }}">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Products <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/admin/products">Edit Products</a></li>
                            <li><a href="/admin/products/create">Add Product</a></li>
                        </ul>
                    </li>
                    <li class="dropdown {{ ( Route::getCurrentRoute()->getPath() === 'admin/slideshow' || Route::getCurrentRoute()->getPath() === 'admin/slideshow/create' ) ? 'active' : NULL }}">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Slideshow <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/admin/slideshow">Slideshow Editor</a></li>
                            <li><a href="/admin/slideshow/create">Add Slide</a></li>
                        </ul>
                    </li>
                    <li class="dropdown {{ ( Route::getCurrentRoute()->getPath() === 'admin/users' || Route::getCurrentRoute()->getPath() === 'admin/register' ) ? 'active' : NULL }}">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Users <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/admin/users">Edit Users</a></li>
                            <li><a href="/admin/register">Add User</a></li>
                        </ul>
                    </li>
                    <li class="{{ ( Route::getCurrentRoute()->getPath() === 'admin/messages' ) ? 'active' : NULL }}">
                        <a href="/admin/messages">Messages</a>
                    </li>
                </ul>
                @endif
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li>
                            <a href="{{ url('/admin/login') }}">Login</a>
                        </li>
                    @else
                        <li>
                            <a href="{{ url('/admin/logout') }}">Logout</a>
                        </li>
                    @endif
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
</body>
</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Kids Video Game Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
    Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } 
    </script>
    <!-- css -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!--// css -->
    <!-- font -->
    <link
        href='//fonts.googleapis.com/css?family=Josefin+Sans:400,100,100italic,300,300italic,400italic,600,600italic,700,700italic'
        rel='stylesheet' type='text/css'>
    <link
        href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic'
        rel='stylesheet' type='text/css'>
    <!-- //font -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="https://use.fontawesome.com/350fd144f4.js"></script>
</head>

<body>
    <!-- Header -->
    <div class="@yield('className')">
        <!-- Navbar -->
        <nav class="navbar navbar-default">
            <div class="containers">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="/">
                        <h1>Kids <img src="images/c1.png" alt=" " /> Game</h1>
                    </a>
                </div>

                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hover-effect"><a href="/">Home</a></li>
                        <li class="hover-effect"><a href="/about">About</a></li>
                        <li class="hover-effect"><a href="/games">Games</a></li>
                        <li class="hover-effect"><a href="/news">News</a></li>
                        <li class="hover-effect"><a href="/contact">Contact</a></li>
                        @guest
                        <li class="hover-effect">
                            <a href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="hover-effect">
                            <a href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="hover-effect">
                            <a href="#"
                                onclick="$(this).parent().find('div').toggleClass('d-none')">{{ Auth::user()->name }}</a>
                            <div class="d-none" style="background: white;width: 100%;height: fit-content;">
                                <a style="display: flex;justify-content: center;align-items: center;height: 40px;color: black;"
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>

            </div>
        </nav>
        <!-- //Navbar -->

        @yield('slider')

    </div>
    <!-- Banner-Slider-JavaScript -->
    <script src="js/responsiveslides.min.js"></script>
    <script>
        var jq142 = jQuery.noConflict();
    jq142(document).ready(function () {
        jq142("#slider").responsiveSlides({
            auto: true,
            nav: true,
            speed: 800,
            namespace: "callbacks",
            pager: true,
        });
    });
    </script>
    <!-- //Banner-Slider-JavaScript -->
    <!-- //Header -->
    <div id="app">
        <div class="container-fluid">
            @yield('website')
        </div>
    </div>
    @stack('script')

    <!-- footer -->
    <div class="footer">
        <div class="containers">
            <div class="col-md-3 footer-left-w3">
                <h4>Contact</h4>
                <ul>
                    <li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></li>
                    <li><a href="mailto:example@mail.com">
                            <h6>ex@mail.com</h6>
                        </a></li>
                </ul>
                <ul>
                    <li><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span></li>
                    <li>
                        <h6>+18045678834</h6>
                    </li>
                </ul>
                <ul>
                    <li><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></li>
                    <li>
                        <h6>4th Avenue,London</h6>
                    </li>
                </ul>
                <ul>
                    <li><span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span></li>
                    <li>
                        <h6>(0033)6544 5453 644</h6>
                    </li>
                </ul>
            </div>
            <div class="col-md-5 footer-middle-w3">
                <h4>Latest Games</h4>
                <div class="col-md-3 img-w3-agile">
                    <a href="single.html"><img class="image" src="images/ng1.jpg" alt=" " /></a>
                </div>
                <div class="col-md-3 img-w3-agile">
                    <a href="single.html"><img class="image" src="images/ng2.jpg" alt=" " /></a>
                </div>
                <div class="col-md-3 img-w3-agile">
                    <a href="single.html"><img class="image" src="images/ng3.jpg" alt=" " /></a>
                </div>
                <div class="col-md-3 img-w3-agile">
                    <a href="single.html"><img class="image" src="images/ng4.jpg" alt=" " /></a>
                </div>
                <div class="col-md-3 img-w3-agile footer-middle-wthree">
                    <a href="single.html"><img class="image" src="images/ng5.jpg" alt=" " /></a>
                </div>
                <div class="col-md-3 img-w3-agile footer-middle-wthree">
                    <a href="single.html"><img class="image" src="images/ng6.jpg" alt=" " /></a>
                </div>
                <div class="col-md-3 img-w3-agile footer-middle-wthree">
                    <a href="single.html"><img class="image" src="images/ng7.jpg" alt=" " /></a>
                </div>
                <div class="col-md-3 img-w3-agile footer-middle-wthree">
                    <a href="single.html"><img class="image" src="images/ng8.jpg" alt=" " /></a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-4 footer-right-w3">
                <a href="/">
                    <h4>Kids <img src="images/f1.png" alt=" " /> Game</h4>
                </a>
                <p>Donec lobortis diam eu auctor porta. Phasellus in elementum tortor, sit amet imperdiet urna
                    pellentesque non risus porta.</p>
                <p class="agileinfo">Suspendisse convallis malesuada libero, non rutrum arcu pellentesque lacinia.</p>
            </div>
            <div class="clearfix"></div>
            <div class="copyright">
                <p>&copy; 2020 Kids Video Game. All Rights Reserved | Design by <a href="http://w3layouts.com/"
                        target="_blank"> W3layouts </a></p>
            </div>
        </div>
    </div>

    <!-- //footer -->

</body>

</html>

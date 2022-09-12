<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="generator" content="">
    {{-- <link href="css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    {{-- <link href="css/style.css" rel="stylesheet"> --}}
    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:200,300,400,500,600,700" rel="stylesheet">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body>


    <!-- HEADER =============================-->
    <header class="item header margin-top-0">
        <div class="wrapper">
            <nav role="navigation" class="navbar navbar-white navbar-embossed navbar-lg navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <button data-target="#navbar-collapse-02" data-toggle="collapse" class="navbar-toggle"
                            type="button">
                            <i class="fa fa-bars"></i>
                            <span class="sr-only">Toggle navigation</span>
                        </button>
                        <a href="index.html" class="navbar-brand brand"> SCORILO </a>
                    </div>
                    <div id="navbar-collapse-02" class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="propClone"><a href="{{ url('user/home') }}">Home</a></li>
                            <li class="propClone"><a href="{{ url('user/shop') }}">Shop</a></li>
                            {{-- <li class="propClone"><a href="product.html">Article</a></li> --}}
                            <li class="propClone"><a href="{{ url('user/cart') }}">Cart</a></li>
                            <li class="propClone"><a href="{{ url('user/order') }}">Order</a></li>
                            <li class="propClone"><a href="{{ url('user/profile') }}">Profile</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="text-homeimage">
                            <div class="maintext-image" data-scrollreveal="enter top over 1.5s after 0.1s">
                                Increase Digital Sales
                            </div>
                            <div class="subtext-image" data-scrollreveal="enter bottom over 1.7s after 0.3s">
                                Boost revenue with Scorilo
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <br />




    @yield('user-home')
    @yield('article')
    @yield('shop')
    @yield('cart')





    <!-- FOOTER =============================-->
    <div class="footer text-center">
        <div class="container">
            <div class="row">
                <p class="footernote">
                    Connect with Scorilo
                </p>
                <ul class="social-iconsfooter">
                    <li><a href="#"><i class="fa fa-phone"></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                </ul>
                <p>
                    &copy; 2017 Your Website Name<br />
                    Scorilo - Free template by <a href="https://www.wowthemes.net/">WowThemesNet</a>
                </p>
            </div>
        </div>
    </div>

    <!-- SCRIPTS =============================-->
    <script src="js/jquery-.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/anim.js"></script>
    <script>
        //----HOVER CAPTION---//	  
        jQuery(document).ready(function($) {
            $('.fadeshop').hover(
                function() {
                    $(this).find('.captionshop').fadeIn(150);
                },
                function() {
                    $(this).find('.captionshop').fadeOut(150);
                }
            );
        });
    </script>

</body>

</html>

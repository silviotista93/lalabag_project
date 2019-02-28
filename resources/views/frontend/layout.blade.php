<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/frontend/img/icon.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <!-- ************************* CSS Files ************************* -->

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="/frontend/css/vendor.css">

    <!-- style css -->
    <link rel="stylesheet" href="/frontend/css/main.css">
    <link rel="stylesheet" href="/frontend/css/checkbox.css">
    <link rel="stylesheet" href="/frontend/css/select.css">

</head>

<body>

<!-- Preloader Start -->
<div class="zakas-preloader active">
    <div class="zakas-preloader-inner h-100 d-flex align-items-center justify-content-center">
        <div class="zakas-child zakas-bounce1"></div>
        <div class="zakas-child zakas-bounce2"></div>
        <div class="zakas-child zuka-bounce3"></div>
    </div>
</div>
<!-- Preloader End -->

<!-- Main Wrapper Start -->
<div class="wrapper">
    <!-- Header Start -->
    <header class="header">
        {{--<div class="header-topbar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-5 text-center text-lg-left">
                        <p class="font-weight-light">Welcome to “zackas”</p>
                    </div>
                    <div class="col-md-7 text-center text-lg-right">
                        <ul class="header-contact-list list-inline">
                            <li class="list-inline-item"><i class="fa fa-phone"></i><span>+98 558 547 589</span></li>
                            <li class="list-inline-item"><i class="fa fa-envelope"></i><a href="mailto:education@email">education@email.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>--}}
        <!--=====================================
		    NAVEGACIÓN
        ======================================-->
        <div class="header-inner fixed-header bg-color" data-bg-color="#f6ece4">
            @include('frontend.partials.navigation')
        </div>
    </header>

    @yield('content')

    <!-- Footer Start-->
    <footer class="footer">
        <div class="footer-top bg-color ptb--50" data-bg-color="#f6f6f6">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-9 text-center">
                        <div class="footer-widget mb--50">
                            <div class="textwidget">
                                <h1>Lala Bag</h1>
                            </div>
                        </div>
                        <div class="footer-widget mb--50 pb--1">
                            <ul class="footer-menu">
                                <li><a href="">Contactanos</a></li>
                                <li><a href="">Terminos &amp; Condiciones</a></li>
                                <li><a href="">Preguntas Frecuentes</a></li>
                                <li><a href="">Ayuda</a></li>
                            </ul>
                        </div>
                        <div class="footer-widget">
                            <!-- Social Icons Start Here -->
                            <ul class="social">
                                <li class="social__item">
                                    <a href="https://plus.google.com/" class="social__link google-plus">
                                        <span>Google Plus</span>
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </li>
                                <li class="social__item">
                                    <a href="https://facebook.com/" class="social__link facebook">
                                        <span>facebook</span>
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li class="social__item">
                                    <a href="https://pinterest.com" class="social__link pinterest">
                                        <span>pinterest</span>
                                        <i class="fa fa-pinterest-p"></i>
                                    </a>
                                </li>
                                <li class="social__item">
                                    <a href="youtube.com" class="social__link twitter">
                                        <span>twitter</span>
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                            </ul>
                            <!-- Social Icons End Here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom bg-color ptb--25" data-bg-color="#e7e7e7">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-sm-6 text-sm-left text-center mb-xs--10">
                        <p class="copyright-text"><a href="index.html">Lala Bag</a> &copy; 2019 todos los derechos reservados</p>
                    </div>
                    <div class="col-sm-6 text-sm-right text-center">
                        <figure>
                            <img src="/frontend/img/others/payment.png" alt="payment">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer End-->

    <!-- Searchform Popup Start -->
    <div class="searchform__popup" id="searchForm">
        <a href="#" class="btn-close"><i class="flaticon flaticon-cross"></i></a>
        <div class="searchform__body">
            {{--<p>Start typing and press Enter to search</p>--}}
            <form class="searchform">
                <input type="text" name="popup-search" id="popup-search" class="searchform__input" placeholder="Buscar en toda la tienda...">
                <button type="submit" class="searchform__submit"><i class="flaticon flaticon-magnifying-glass-icon"></i></button>
            </form>
        </div>
    </div>

    <div class="zakas-global-overlay"></div>

</div>


<!-- jQuery JS -->
<script src="/frontend/js/vendor.js"></script>

<!-- Main JS -->
<script src="/frontend/js/main.js"></script>
<script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
@section('js')
@show
</body>

</html>
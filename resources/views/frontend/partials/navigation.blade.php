<div class="container">
    <div class="row align-items-center">
        <div class="col-xl-10 col-lg-9 col-3">
            <nav class="main-navigation">
                <div class="site-branding">
                    <a href="{{ route('home') }}" class="logo">
                        <figure class="logo--transparent">
                            LalaBag
                            {{--<img src="/frontend/img/logo/logo-white.png" alt="Logo">--}}
                        </figure>
                        <figure class="logo--normal">
                            LalaBag
                            {{--<img src="/frontend/img/logo/logo.png" alt="Logo">--}}
                        </figure>
                    </a>
                </div>
                <div class="mainmenu-nav d-none d-lg-block">
                    <ul class="mainmenu">
                        <li class="mainmenu__item menu-item-has-children {{request()->is('/') ? 'active':''}}">
                            <a href="{{ route('home') }}" class="mainmenu__link">
                                <span class="mm-text">Inicio</span>
                            </a>
                        </li>
                        <li class="mainmenu__item menu-item-has-children {{request()->is('/tienda') ? 'active':''}}">
                            <a href="#" class="mainmenu__link">
                                <span class="mm-text">Tienda</span>
                            </a>
                        </li>
                        <li class="mainmenu__item menu-item-has-children {{request()->is('/lala-tips') ? 'active':''}}">
                            <a href="#" class="mainmenu__link">
                                <span class="mm-text">Lala Tips</span>
                            </a>
                        </li>
                        <li class="mainmenu__item {{request()->is('/contactanos') ? 'active':''}}">
                            <a href="#" class="mainmenu__link">
                                <span class="mm-text">Contáctanos</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="col-xl-2 col-lg-3 col-9 text-right">
            <ul class="header-toolbar">
                <li class="header-toolbar__item">
                    <a href="#" class="header-toolbar__btn">
                        <i class="flaticon flaticon-like"></i>
                    </a>
                </li>
                <li class="header-toolbar__item mini-cart-item">
                    <a href="#miniCart" class="header-toolbar__btn toolbar-btn mini-cart-btn">
                        <i class="flaticon flaticon-shopping-cart"></i>
                        <sup class="mini-cart-count">2</sup>
                    </a>
                </li>
                @if(auth()->user())
                <li class="header-toolbar__item user-info {{request()->is('/login-registro') ? 'active':''}}">
                    <a href="{{ route('profile') }}" class="header-toolbar__btn">
                        <i class="flaticon flaticon-user"></i>
                    </a>
                    {{--<ul class="user-info-menu">
                        <li>
                            <a href="my-account.html">My Account</a>
                        </li>
                        <li>
                            <a href="cart.html">Shopping Cart</a>
                        </li>
                        <li>
                            <a href="checkout.html">Check Out</a>
                        </li>
                        <li>
                            <a href="wishlist.html">Wishlist</a>
                        </li>
                        <li>
                            <a href="order-tracking.html">Order tracking</a>
                        </li>
                        <li>
                            <a href="compare.html">compare</a>
                        </li>
                    </ul>--}}
                </li>
                @else
                    <li class="header-toolbar__item user-info {{request()->is('/login-registro') ? 'active':''}}">
                        <a href="{{ route('login.registro') }}" class="header-toolbar__btn">
                            <i class="flaticon flaticon-user"></i>
                        </a>
                        {{--<ul class="user-info-menu">
                            <li>
                                <a href="my-account.html">My Account</a>
                            </li>
                            <li>
                                <a href="cart.html">Shopping Cart</a>
                            </li>
                            <li>
                                <a href="checkout.html">Check Out</a>
                            </li>
                            <li>
                                <a href="wishlist.html">Wishlist</a>
                            </li>
                            <li>
                                <a href="order-tracking.html">Order tracking</a>
                            </li>
                            <li>
                                <a href="compare.html">compare</a>
                            </li>
                        </ul>--}}
                    </li>
                @endif
                <li class="header-toolbar__item">
                    <a href="#searchForm" class="header-toolbar__btn toolbar-btn">
                        <i class="flaticon flaticon-search"></i>
                    </a>
                </li>
                <li class="header-toolbar__item d-lg-none">
                    <a href="#" class="header-toolbar__btn menu-btn">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="mobile-menu"></div>
        </div>
    </div>
</div>
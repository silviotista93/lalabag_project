@extends('frontend.layout')

@section('content')
<div class="main-content-wrapper">

    @include('frontend.partials.sliders')
    <section class="newsletter-area mb--100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h2 class="heading__secondary mb--5">Queremos lo mejor para ti</h2>
                    <p class="max-w-60 max-w-sm-95 mx-auto">Por eso trabajamos para brindarles los mejores productos que hay en el mercado. Todos los meses recibiras 5 productos de belleza, totalmente originales. Solo pagas <div style="color: #e8b8c3; font-size: 20px">60.000 + Envio</div></p>
                </div>
            </div>
        </div>
    </section>
    <div class="banner-area mb--45">
        <div class="container-fluid">
            <div class="row gutter-50 gutter-md-40">
                <div class="col-md-6 mb--50">
                    <div class="banner-box">
                        <div class="banner-inner banner-hover-2 banner-info-over-img banner-info-left-top">
                            <figure class="banner-image">
                                <img src="/frontend/img/home/productos_sorpresa.png" alt="Banner">
                            </figure>
                            <div class="banner-info">
                                <div class="banner-info--inner pl--50 pt--150">
                                    <p class="banner-paragraph-1 color--white"></p>
                                    <p class="banner-title-2 color--white font-weight-light mb--0"></p>
                                    <a href="shop.html" class="btn btn-no-bg btn-color-white" style="top: 120px">Conoce más <i class="fa fa-angle-double-right"></i></a>
                                </div>
                            </div>
                            <a href="shop.html" class="banner-link"></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb--50">
                    <div class="banner-box">
                        <div class="banner-inner banner-hover-2 banner-info-over-img banner-info-left-top">
                            <figure class="banner-image">
                                <img src="/frontend/img/home/productos.png" alt="Banner">
                            </figure>
                            <div class="banner-info">
                                <div class="banner-info--inner pl--50 pt--150">
                                    <p class="banner-paragraph-1 color--white"></p>
                                    <p class="banner-title-2 color--white font-weight-light mb--0"></p>
                                    <a href="shop.html" class="btn btn-no-bg btn-color-white" style="top: 130px">Conoce más <i class="fa fa-angle-double-right"></i></a>
                                </div>
                            </div>
                            <a href="shop.html" class="banner-link"></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb--50">
                    <div class="banner-box">
                        <div class="banner-inner banner-hover-2 banner-info-over-img banner-info-left-top">
                            <figure class="banner-image">
                                <img src="/frontend/img/home/medios_pago.png" alt="Banner">
                            </figure>
                            <div class="banner-info">
                                <div class="banner-info--inner pl--50 pt--150">
                                    <p class="banner-paragraph-1 color--white"></p>
                                    <p class="banner-title-2 color--white font-weight-light mb--0"></p>
                                    <a href="shop.html" class="btn btn-no-bg btn-color-white" style="top: 130px">Conoce más <i class="fa fa-angle-double-right"></i></a>
                                </div>
                            </div>
                            <a href="shop.html" class="banner-link"></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb--50">
                    <div class="banner-box">
                        <div class="banner-inner banner-hover-2 banner-info-over-img banner-info-left-top">
                            <figure class="banner-image">
                                <img src="/frontend/img/home/supcriptoras.png" alt="Banner">
                            </figure>
                            <div class="banner-info">
                                <div class="banner-info--inner pl--50 pt--150">
                                    <p class="banner-paragraph-1 color--white"></p>
                                    <p class="banner-title-2 color--white font-weight-light mb--0"></p>
                                    <a href="shop.html" class="btn btn-no-bg btn-color-white" style="top: 130px">Conoce más <i class="fa fa-angle-double-right"></i></a>
                                </div>
                            </div>
                            <a href="shop.html" class="banner-link"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="product-tab-area mb--95">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="heading__secondary mb--5 text-center" style="padding-bottom: 25px">Productos</h2>
                    <div class="product-tab tab-style-2">
                        <div class="tab-content" id="new-arrival-tab-content">
                            <div class="tab-pane fade show active" id="nav-new" role="tabpanel" aria-labelledby="nav-new-tab">
                                <div class="zakas-element-carousel nav-right-center custom-center" data-slick-options='{
                                            "spaceBetween": 30,
                                            "slidesToShow": 4,
                                            "slidesToScroll": 1,
                                            "arrows": true,
                                            "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-double-left" },
                                            "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-double-right" }
                                        }'
                                     data-slick-responsive= '[
                                            {"breakpoint":1199, "settings": {
                                                "slidesToShow": 3
                                            }},
                                            {"breakpoint":991, "settings": {
                                                "slidesToShow": 2
                                            }},
                                            {"breakpoint":575, "settings": {
                                                "slidesToShow": 1
                                            }}
                                        ]'>
                                    <div class="item">
                                        <div class="zakas-product">
                                            <div class="product-inner">
                                                <figure class="product-image">
                                                    <a href="product-details.html">
                                                        <img src="/frontend/img/products/prod-9.jpg" alt="Products">
                                                    </a>
                                                    <span class="product-badge">New</span>
                                                </figure>
                                                <div class="product-info">
                                                    <h3 class="product-title mb--15">
                                                        <a href="product-details.html">Long Cartigen</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="zakas-product">
                                            <div class="product-inner">
                                                <figure class="product-image">
                                                    <a href="product-details.html">
                                                        <img src="/frontend/img/products/prod-9.jpg" alt="Products">
                                                    </a>
                                                    <span class="product-badge">New</span>
                                                </figure>
                                                <div class="product-info">
                                                    <h3 class="product-title mb--15">
                                                        <a href="product-details.html">Long Cartigen</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="zakas-product">
                                            <div class="product-inner">
                                                <figure class="product-image">
                                                    <a href="product-details.html">
                                                        <img src="/frontend/img/products/prod-9.jpg" alt="Products">
                                                    </a>
                                                    <span class="product-badge">New</span>
                                                </figure>
                                                <div class="product-info">
                                                    <h3 class="product-title mb--15">
                                                        <a href="product-details.html">Long Cartigen</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="zakas-product">
                                            <div class="product-inner">
                                                <figure class="product-image">
                                                    <a href="product-details.html">
                                                        <img src="/frontend/img/products/prod-9.jpg" alt="Products">
                                                    </a>
                                                    <span class="product-badge">New</span>
                                                </figure>
                                                <div class="product-info">
                                                    <h3 class="product-title mb--15">
                                                        <a href="product-details.html">Long Cartigen</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="zakas-product">
                                            <div class="product-inner">
                                                <figure class="product-image">
                                                    <a href="product-details.html">
                                                        <img src="/frontend/img/products/prod-9.jpg" alt="Products">
                                                    </a>
                                                    <span class="product-badge">New</span>
                                                </figure>
                                                <div class="product-info">
                                                    <h3 class="product-title mb--15">
                                                        <a href="product-details.html">Long Cartigen</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="zakas-product">
                                            <div class="product-inner">
                                                <figure class="product-image">
                                                    <a href="product-details.html">
                                                        <img src="/frontend/img/products/prod-9.jpg" alt="Products">
                                                    </a>
                                                    <span class="product-badge">New</span>
                                                </figure>
                                                <div class="product-info">
                                                    <h3 class="product-title mb--15">
                                                        <a href="product-details.html">Long Cartigen</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="fullwidth-banner-area ptb--220 mb--100 bg-image bg-style" data-bg-image="/frontend/img/slider/slide_5.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6 text-center">
                    <p class="color--primary font-weight-bold mb--10">¡Que esperas!</p>
                    <h2 class="heading__secondary font-weight-bold mb--35">Registrate y conoce más información</h2>
                    <a href="shop.html" class="btn">Registrate<i class="fa fa-angle-double-right"></i></a>
                </div>
            </div>
        </div>
    </section>
</div>
@stop